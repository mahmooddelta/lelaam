<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use RalphJSmit\Helpers\Laravel\Concerns\HasFactory;

/**
 * App\Models\AdReport
 *
 * @property int $id
 * @property int $ad_id
 * @property int $user_id
 * @property int $report_type_id
 * @property string $description
 * @property string $status
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Ad $ad
 * @property-read string $status_message
 * @property-read \App\Models\ReportType $reportType
 * @property-read \App\Models\User $user
 * @method static Builder|AdReport active()
 * @method static Builder|AdReport newModelQuery()
 * @method static Builder|AdReport newQuery()
 * @method static Builder|AdReport query()
 * @method static Builder|AdReport whereAdId($value)
 * @method static Builder|AdReport whereCreatedAt($value)
 * @method static Builder|AdReport whereDescription($value)
 * @method static Builder|AdReport whereId($value)
 * @method static Builder|AdReport whereIsActive($value)
 * @method static Builder|AdReport whereReportTypeId($value)
 * @method static Builder|AdReport whereStatus($value)
 * @method static Builder|AdReport whereUpdatedAt($value)
 * @method static Builder|AdReport whereUserId($value)
 * @mixin \Eloquent
 */
class AdReport extends Model
{
//    use HasFactory;

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
