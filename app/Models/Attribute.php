<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
