<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends \Nnjeim\World\Models\City {
	
	use HasFactory;
	
	protected $fillable = [
		'name',
		'country_id',
		'state_id',
		'country_code',
	];
}