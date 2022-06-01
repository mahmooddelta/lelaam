<?php

namespace App\Filament\Resources\CountryResource\Pages;

use App\Filament\Resources\CountryResource;
use App\Models\Country;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListCountries extends ListRecords
{
    protected static string $resource = CountryResource::class;

    protected function getTableQuery(): Builder
    {
        return Country::query()->latest();
    }
}
