<?php

namespace App\Filament\Widgets;

use App\Models\Ad;
use App\Models\Scopes\AdNotExpiredScope;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use function __;

class AdStats extends BaseWidget
{
    protected static ?int $sort = 2;
    protected function getCards(): array
    {
        return [
            Card::make(__('general.widgets.total_num_ads'), Ad::withoutGlobalScope(AdNotExpiredScope::class)->count())
                ->icon('heroicon-s-speakerphone')
                ->color('primary'),

            Card::make(__('general.widgets.total_num_published_ads'), Ad::withoutGlobalScope(AdNotExpiredScope::class)->published()->count())
                ->icon('heroicon-s-badge-check')
                ->color('primary'),

            Card::make(__('general.widgets.total_num_not_published_ads'), Ad::withoutGlobalScope(AdNotExpiredScope::class)->notPublished()->count())
                ->icon('heroicon-s-ban')
                ->color('primary'),

        ];
    }
}
