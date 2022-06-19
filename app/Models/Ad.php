<?php

namespace App\Models;

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
use function request;

/**
 * App\Models\Ad
 *
 * @property int $id
 * @property int|null $user_id
 * @property int $category_id
 * @property string $title
 * @property string $slug
 * @property int|null $price 0 Means Negotiable
 * @property int|null $currency_id
 * @property string $phone_number
 * @property string $desc
 * @property string $address
 * @property int|null $district_id
 * @property bool $is_published
 * @property int $is_chat_enabled
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Attribute[] $attributes
 * @property-read int|null $attributes_count
 * @property-read \App\Models\Category $category
 * @property-read \App\Models\Currency|null $currency
 * @property-read \App\Models\District|null $district
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\AdReport[] $reports
 * @property-read int|null $reports_count
 * @property-read \RalphJSmit\Laravel\SEO\Models\SEO $seo
 * @property-read \App\Models\User|null $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\AttributeValue[] $values
 * @property-read int|null $values_count
 * @method static \Database\Factories\AdFactory factory(...$parameters)
 * @method static Builder|Ad filter(\Illuminate\Http\Request $request)
 * @method static Builder|Ad isChatEnabled()
 * @method static Builder|Ad isOwner()
 * @method static Builder|Ad newModelQuery()
 * @method static Builder|Ad newQuery()
 * @method static Builder|Ad notPublished()
 * @method static \Illuminate\Database\Query\Builder|Ad onlyTrashed()
 * @method static Builder|Ad published()
 * @method static Builder|Ad query()
 * @method static Builder|Ad sameState()
 * @method static Builder|Ad todayCreated()
 * @method static Builder|Ad whereAddress($value)
 * @method static Builder|Ad whereCategoryId($value)
 * @method static Builder|Ad whereCreatedAt($value)
 * @method static Builder|Ad whereCurrencyId($value)
 * @method static Builder|Ad whereDeletedAt($value)
 * @method static Builder|Ad whereDesc($value)
 * @method static Builder|Ad whereDistrictId($value)
 * @method static Builder|Ad whereHasMark(\Maize\Markable\Mark $mark, \Illuminate\Database\Eloquent\Model $user, ?string $value = null)
 * @method static Builder|Ad whereId($value)
 * @method static Builder|Ad whereIsChatEnabled($value)
 * @method static Builder|Ad whereIsPublished($value)
 * @method static Builder|Ad wherePhoneNumber($value)
 * @method static Builder|Ad wherePrice($value)
 * @method static Builder|Ad whereSlug($value)
 * @method static Builder|Ad whereTitle($value)
 * @method static Builder|Ad whereUpdatedAt($value)
 * @method static Builder|Ad whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Ad withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Ad withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Message[] $messages
 * @property-read int|null $messages_count
 */
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
        'is_chat_enabled',
    ];

    protected static $marks = [
        Bookmark::class,
        Like::class,
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

    public function reports(): HasMany
    {
        return $this->hasMany(AdReport::class);
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
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

    public function scopePublished(Builder $query): Builder
    {
        return $query->whereIsPublished(true);
    }

    public function scopeNotPublished(Builder $query): Builder
    {
        return $query->whereIsPublished(false);
    }

    public function scopeTodayCreated(Builder $query): Ad|m|Builder
    {
        return $query->whereDay('created_at', now()->day);
    }

    public function scopeIsOwner(Builder $query): Builder
    {
        return $query->whereUserId(auth()->id());
    }

    public function scopeIsChatEnabled(Builder $query): Builder
    {
        return $query->whereIsChatEnabled(true);
    }

    public function scopeFilter(Builder $query, Request $request): Builder
    {
        return $query->when($request->has('search') && $request->search !== null, fn(Builder $query) => $query->where('title', 'LIKE', "%".$request->search."%"))
            ->when($request->has('district') && $request->district !== null, fn(Builder $query) => $query->where('district_id', District::whereName($request->district)
                ->value('id')))
            ->when($request->has('state') && $request->state !== null, fn(Builder $query) => $query->whereIn('district_id', District::whereStateId(State::whereName($request->state)
                                                                                                                                                       ->value('id'))
                ->pluck('id')
                ->toArray()))
            ->when(request()->has('hasImages') && request('hasImages') === 'true', fn(Builder $builder) => $builder->whereHas('media'));
    }

    public function scopeSameState(Builder $query): Ad|m|Builder
    {
        return $query->whereIn('district_id', District::whereStateId(auth()->user()->state_id)
            ->pluck('id')
            ->toArray());
    }
}
