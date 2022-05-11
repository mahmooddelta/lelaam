<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Pishran\LaravelPersianSlug\HasPersianSlug;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\SlugOptions;

class Post extends Model implements HasMedia {
	
	use HasFactory, SoftDeletes;
	use InteractsWithMedia;
	use HasSEO;
	use HasPersianSlug;
	
	protected $fillable = [
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
	];
	protected $casts    = [
		'is_published' => 'boolean',
	];
	
	public function category (): BelongsTo {
		return $this->belongsTo(Category::class);
	}
	
	public function currency (): BelongsTo {
		return $this->belongsTo(Currency::class);
	}
	
	public function district (): BelongsTo {
		return $this->belongsTo(District::class);
	}
	
	public function attributes (): BelongsToMany {
		return $this->belongsToMany(Attribute::class);
	}
	
	public function values (): BelongsToMany {
		return $this->belongsToMany(AttributeValue::class);
	}
	
	public function registerMediaConversions (Media $media = null): void {
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
	
	public function getSlugOptions (): SlugOptions {
		return SlugOptions::create()
			->generateSlugsFrom('title')
			->saveSlugsTo('slug');
	}
}