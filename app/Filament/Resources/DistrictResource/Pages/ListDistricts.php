<?php

namespace App\Filament\Resources\DistrictResource\Pages;

use App\Filament\Resources\DistrictResource;
use App\Models\District;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListDistricts extends ListRecords
{
    protected static string $resource = DistrictResource::class;

    protected function getTableQuery(): Builder
    {
        return District::query()->latest();
    }
}
