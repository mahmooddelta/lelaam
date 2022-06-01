<?php

namespace App\Filament\Widgets;

use App\Models\Ad;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use function __;

class TodayAdStats extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getCards(): array
    {
        return [
            Card::make(__('general.widgets.today_num_ads'), Ad::todayCreated()->count())
                ->icon('heroicon-s-calendar')
                ->color('primary'),

            Card::make(__('general.widgets.today_num_published_ads'), Ad::todayCreated()
                ->published()
                ->count())
                ->icon('heroicon-s-badge-check')
                ->color('primary'),

            Card::make(__('general.widgets.today_num_not_published_ads'), Ad::todayCreated()
                ->notPublished()
                ->count())
                ->icon('heroicon-s-ban')
                ->color('primary'),

        ];
    }
}
