<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdReport extends Model
{
    public const STATUS = [
        'pending' => 'در حال بررسی',
        'resolved' => 'تصحیح شده',
        'rejected' => 'رد شده',
    ];

    protected $fillable = [
        'ad_id',
        'user_id',
        'report_type_id',
        'description',
        'status',
        'is_active',
    ];

    public function ad(): BelongsTo
    {
        return $this->belongsTo(Ad::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function reportType(): BelongsTo
    {
        return $this->belongsTo(ReportType::class);
    }

    public function getStatusMessageAttribute(): string
    {
        return self::STATUS[$this->status];
    }

    public function scopeActive(Builder $builder): Builder
    {
        return $builder->whereIsActive(true);
    }
}
