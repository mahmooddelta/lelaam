<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class State extends \Nnjeim\World\Models\State {
	
	use HasFactory;
	
	protected $fillable = [
		'name',
		'country_id',
		'country_code',
	];
}