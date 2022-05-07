<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends \Nnjeim\World\Models\Country {
	
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
}