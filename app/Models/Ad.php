<?php

namespace App\Models;

use App\Models\Scopes\AdNotExpiredScope;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use m;
use Maize\Markable\Markable;
use Maize\Markable\Models\Bookmark;
use Maize\Markable\Models\Like;
use Pishran\LaravelPersianSlug\HasPersianSlug;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\SlugOptions;
use function auth;
use function now;
use function public_path;
use function url;

class Ad extends Model implements HasMedia
{
    use HasFactory, SoftDeletes;
    use InteractsWithMedia;
    use HasSEO;
    use HasPersianSlug;
    use Markable;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'price',
        'currency_id',
        'phone_number',
        'desc',
        'address',
        'district_id',
        'is_published',
        'published_at',
        'is_chat_enabled',
        'expires_at',
    ];

    protected static $marks = [
        Bookmark::class,
        Like::class,
    ];

    protected static function boot()
    {
        parent::boot();
        self::creating(function($model) {
            // 0 means user has not logged in and added the ad as a guest
            $model->user_id = auth('api')->check() ? auth('api')->id() ?? 0 : auth()->id() ?? 0;
            // Add one month to current month for expires_at field of newly created ads
            $model->expires_at = now()->addMonth()->toDateTimeString();
        });

        static::created(function($item) {
            $builder = new \AshAllenDesign\ShortURL\Classes\Builder();
            $builder->destinationUrl(url('post/'.$item->slug))->make();
        });
    }

    protected static function booted(): void
    {
        static::addGlobalScope(new AdNotExpiredScope);
    }

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
        'expires_at' => 'datetime',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function attributes(): BelongsToMany
    {
        return $this->belongsToMany(Attribute::class)->withPivot('value');
    }

    public function values(): BelongsToMany
    {
        return $this->belongsToMany(AttributeValue::class)->withPivot(['attribute_id']);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function reports(): HasMany
    {
        return $this->hasMany(AdReport::class);
    }

    public function conversations(): HasMany
    {
        return $this->hasMany(Conversation::class);
    }

    /**
     * @throws \League\Glide\Filesystem\FileNotFoundException
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('ad')
            ->width(1080)
            ->watermark(public_path('images/logo.png'))
            ->watermarkOpacity(50)
            ->watermarkPadding(4, 4)
            ->watermarkFit(Manipulations::FIT_CONTAIN)
            ->withResponsiveImages()
            ->nonQueued();

        $this->addMediaConversion('thumb')
            ->width(275)
            ->height(330)
            ->fit(Manipulations::FIT_FILL, 275, 330)
            ->watermark(public_path('images/logo.png'))
            ->watermarkOpacity(50)
            ->watermarkPadding(4, 4)
            ->watermarkFit(Manipulations::FIT_CONTAIN)
            ->nonQueued();

        $this->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->whereIsPublished(true);
    }

    public function scopeExpired(Builder $query): Builder
    {
        return $query->where('expires_at', '<', Carbon::parse($this->published_at ?? $this->created_at));
    }

    public function scopeNotExpired(Builder $query): Builder
    {
        return $query->where('expires_at', '>', Carbon::parse($this->published_at ?? $this->created_at));
    }

    public function scopeNotPublished(Builder $query): Builder
    {
        return $query->whereIsPublished(false);
    }

    public function scopeTodayCreated(Builder $query): Ad|m|Builder
    {
        return $query->whereDay('created_at', now()->toDateString());
    }

    public function scopeIsOwner(Builder $query): Builder
    {
        return $query->whereUserId(auth()->id());
    }

    public function scopeIsChatEnabled(Builder $query): Builder
    {
        return $query->whereIsChatEnabled(true);
    }

    public function scopeFilter(Builder $builder, Request $request): Builder
    {
        return $builder->when($request->has('search') && filled($request->search), fn(Builder $query) => $builder->where('title', 'LIKE', "%".$request->search."%"))
            ->when($request->has('category') && filled($request->category), fn(Builder $query) => $builder->where('category_id', Category::whereSlug($request->category)->value('id')))
            ->when($request->has('district') && filled($request->district), fn(Builder $query) => $builder->where('district_id', District::whereName($request->district)->value('id')))
            ->when($request->has('state') && filled($request->state), fn(Builder $query) => $builder->whereIn('district_id', District::whereStateId(State::whereName($request->state)->value('id'))->pluck('id')->toArray()))
            ->when($request->has('hasImages') && $request->hasImages === 'true', fn(Builder $builder) => $builder->whereHas('media'));
    }

    public function scopeSameState(Builder $query): Ad|m|Builder
    {
        return $query->whereIn('district_id', District::whereStateId(auth('api')->check() ? auth('api')->user()->state_id : auth()->user()->state_id)
            ->pluck('id')
            ->toArray());
    }
}
