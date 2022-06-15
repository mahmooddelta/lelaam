<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\ReportType
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\AdReport[] $reports
 * @property-read int|null $reports_count
 * @method static Builder|ReportType active()
 * @method static Builder|ReportType newModelQuery()
 * @method static Builder|ReportType newQuery()
 * @method static Builder|ReportType query()
 * @method static Builder|ReportType whereCreatedAt($value)
 * @method static Builder|ReportType whereDescription($value)
 * @method static Builder|ReportType whereId($value)
 * @method static Builder|ReportType whereIsActive($value)
 * @method static Builder|ReportType whereName($value)
 * @method static Builder|ReportType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
