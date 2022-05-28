<?php

namespace App\Filament\Widgets;

use App\Models\Ad;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Illuminate\Database\Eloquent\Builder;
use function __;

class DashboardStats extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make(__('general.widgets.num_ads'), Ad::published()->count())
                ->icon('heroicon-s-mail')
                ->color('primary')
                ->url('admin/ads'),
            Card::make(__('general.widgets.num_categories'), Category::count())
                ->icon('heroicon-s-tag')
                ->color('success')
                ->url('admin/categories'),
            Card::make(__('general.widgets.num_users'), User::query()
                ->whereHas('roles', fn(Builder $builder) => $builder->whereNot('name', 'super_admin'))
                ->count())
                ->icon('heroicon-s-users')
                ->color('warning')
                ->url('admin/users'),
        ];
    }
}
