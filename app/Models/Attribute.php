<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Attribute
 *
 * @property int $id
 * @property string $name
 * @property string $frontend_type
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Ad[] $ads
 * @property-read int|null $ads_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\AttributeValue[] $values
 * @property-read int|null $values_count
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute isActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute query()
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereFrontendType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Attribute extends Model {

	use HasFactory;

	public const FRONT_END_TYPES = [
		'text' => 'ورودی متن',
		'select' => 'منوی کشویی',
		'number' => 'عدد',
		'checkbox' => 'چک باکس',
		'radio' => 'رادیو باکس',
		//'color' => 'رنگ',
	];

	protected $fillable = [
		'name',
		'frontend_type',
		'is_active',
	];

	public function values (): HasMany {
		return $this->hasMany(AttributeValue::class);
	}

	public function scopeIsActive ($query) {
		return $query->whereIsActive(true);
	}

	public function categories (): BelongsToMany {
		return $this->belongsToMany(Category::class);
	}

	public function ads (): BelongsToMany {
		return $this->belongsToMany(Ad::class);
	}
}
