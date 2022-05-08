<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AttributeValue extends Model {
	
	protected $fillable = [
		'name',
		'attribute_id',
		'is_active',
	];
	
	public function attribute (): BelongsTo {
		return $this->belongsTo(Attribute::class);
	}
	
	public function products (): BelongsToMany {
		return $this->belongsToMany(Product::class, 'product_attribute_values', 'attribute_value_id', 'product_id');
	}
	
	public function scopeIsActive ($query) {
		return $query->whereIsActive(true);
	}
	
	public function posts (): BelongsToMany {
		return $this->belongsToMany(Post::class);
	}
}