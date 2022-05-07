<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class State extends \Nnjeim\World\Models\State {
	
	use HasFactory;
	
	protected $fillable = [
		'name',
		'country_id',
		'country_code',
	];
	
	public function country (): BelongsTo {
		return $this->belongsTo(Country::class);
	}
	
	public function cities (): HasMany {
		return $this->hasMany(City::class);
	}
}