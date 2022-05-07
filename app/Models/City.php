<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class City extends \Nnjeim\World\Models\City {
	
	use HasFactory;
	
	protected $fillable = [
		'name',
		'country_id',
		'state_id',
		'country_code',
	];
	
	public function country (): BelongsTo {
		return $this->belongsTo(Country::class);
	}
	
	public function state (): BelongsTo {
		return $this->belongsTo(State::class);
	}
}