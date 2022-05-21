<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Pishran\LaravelPersianSlug\HasPersianSlug;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\SlugOptions;
use function auth;
use function request;

class Ad extends Model implements HasMedia
{
    use HasFactory, SoftDeletes;
    use InteractsWithMedia;
    use HasSEO;
    use HasPersianSlug;

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
        'is_chat_enabled',
    ];

    protected static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            // 0 means user has not logged in and added the ad as a guest
            $model->user_id = auth()->id() ?? 0;
        });
    }

    protected $casts = [
        'is_published' => 'boolean',
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

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(275)
            ->height(330)
            ->fit(Manipulations::FIT_FILL, 275, 330)
            ->withResponsiveImages()
            ->nonQueued();
        $this->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function scopePublished(): Builder
    {
        return $this->whereIsPublished(true);
    }

    public function scopeIsOwner(): Builder
    {
        return $this->whereUserId(auth()->id());
    }

    public function scopeIsChatEnabled(): Builder
    {
        return $this->whereIsChatEnabled(true);
    }

    public function scopeFilter($query, Request $request): Builder
    {
        return $this->when($request->has('search') && request('search') !== '', fn(Builder $query) => $query->where('title', 'LIKE', "%".request('search')."%"))
            ->when($request->has('category') && request('category') !== '', fn(Builder $query) => $query->where('category_id', Category::whereSlug(request('category'))
                ->value('id')))
            ->when($request->has('district') && request('district') !== '', fn(Builder $query) => $query->where('district_id', request('district')))
            ->when($request->has('state') && request('state') !== '', fn(Builder $query) => $query->whereIn('district_id', District::whereStateId(request('state'))
                ->pluck('id')->toArray()));
    }
}
