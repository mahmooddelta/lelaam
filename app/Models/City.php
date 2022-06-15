<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\City
 *
 * @property-read \App\Models\Country|null $country
 * @property-read \App\Models\State|null $state
 * @method static \Illuminate\Database\Eloquent\Builder|City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City query()
 * @mixin \Eloquent
 */
class City extends Model {
	
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