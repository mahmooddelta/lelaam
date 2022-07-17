<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ReportType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'is_active',
    ];

    public function reports(): HasMany
    {
        return $this->hasMany(AdReport::class);
    }

    public function scopeActive(Builder $builder): Builder
    {
        return $builder->whereIsActive(true);
    }
}
