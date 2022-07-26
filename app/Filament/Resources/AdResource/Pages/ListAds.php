<?php

namespace App\Filament\Resources\AdResource\Pages;

use App\Filament\Resources\AdResource;
use App\Models\Ad;
use App\Models\Scopes\AdNotExpiredScope;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListAds extends ListRecords
{
    protected static string $resource = AdResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getTableFiltersFormColumns(): int|array
    {
        return 2;
    }

    protected function getTableFiltersFormWidth(): string
    {
        return '4xl';
    }
}
