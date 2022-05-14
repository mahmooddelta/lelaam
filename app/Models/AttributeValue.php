<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AttributeValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'attribute_id',
        'is_active',
    ];

    public function attribute(): BelongsTo
    {
        return $this->belongsTo(Attribute::class);
    }

    public function scopeIsActive($query)
    {
        return $query->whereIsActive(true);
    }

    public function ads(): BelongsToMany
    {
        return $this->belongsToMany(Ad::class);
    }
}
