<?php

namespace App\Filament\Widgets;

use App\Models\Ad;
use Filament\Widgets\LineChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Support\Carbon;
use function __;
use function now;

class AdsChart extends LineChartWidget
{

    protected int|string|array $columnSpan = 'full';

    protected static ?string $heading = 'آگهی ها';

    protected static ?int $sort = 999;

    protected function getFilters(): ?array
    {
        return [
            'today' => 'امروز',
            'month' => 'ماه فعلی',
            'year' => 'امسال',
        ];
    }

    private function setTrendStart(?string $filter): Carbon|null
    {
        return match ($filter) {
            'month' => now()->startOfMonth(),
            'year' => now()->startOfYear(),
            default => now()->startOfDay()
        };
    }

    private function setTrendEnd(?string $filter): Carbon|null
    {
        return match ($filter) {
            default => now()->endOfDay(),
            'month' => now()->endOfMonth(),
            'year' => now()->endOfYear(),
        };
    }

    protected function getData(): array
    {
        $ads = Trend::model(Ad::class)
            ->between(
                start: $this->setTrendStart($this->filter),
                end  : $this->setTrendEnd($this->filter)
            )
            ->perMonth()
            ->perDay()
            ->count();
        $publishedAds = Trend::query(
            Ad::published()
        )
            ->between(
                start: $this->setTrendStart($this->filter),
                end  : $this->setTrendEnd($this->filter)
            )
            ->perMonth()
            ->perDay()
            ->count();

        $notPublishedAds = Trend::query(
            Ad::notPublished()
        )
            ->between(
                start: $this->setTrendStart($this->filter),
                end  : $this->setTrendEnd($this->filter)
            )
            ->perMonth()
            ->perDay()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => __('general.widgets.ads_not_published_chart'),
                    'data' => $notPublishedAds->map(fn(TrendValue $value) => $value->aggregate),
                    'borderColor' => '#dc2626',
                ],
                [
                    'label' => __('general.widgets.ads_published_chart'),
                    'data' => $publishedAds->map(fn(TrendValue $value) => $value->aggregate),
                    'borderColor' => 'rgb(34 197 94)',
                ],
                [
                    'label' => __('general.widgets.ads_chart'),
                    'data' => $ads->map(fn(TrendValue $value) => $value->aggregate),
                    'borderColor' => '#0ea5e9',
                ],
            ],
            'labels' => $ads->map(fn(TrendValue $value) => $value->date),
        ];
    }
}
