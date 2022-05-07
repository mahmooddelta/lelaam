<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model {
	
	use HasFactory;
	
	protected $fillable = [
		'iso2',
		'name',
		'status',
		'phone_code',
		'iso3',
		'region',
		'subregion',
	];
	
	protected $casts = [
		'status' => 'boolean',
	];
	
	public function states (): HasMany {
		return $this->hasMany(State::class, 'country_id', 'id');
	}
	
	public function cities (): HasMany {
		return $this->hasMany(City::class, 'country_id', 'id');
	}
}