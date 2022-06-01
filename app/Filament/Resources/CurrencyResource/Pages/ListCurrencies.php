<?php

namespace App\Filament\Resources\CurrencyResource\Pages;

use App\Filament\Resources\CurrencyResource;
use App\Models\Currency;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListCurrencies extends ListRecords
{
    protected static string $resource = CurrencyResource::class;

    protected function getTableQuery(): Builder
    {
        return Currency::query()->latest();
    }
}
