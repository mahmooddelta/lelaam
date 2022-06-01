<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use App\Models\Setting;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListSettings extends ListRecords
{
    protected static string $resource = SettingResource::class;

    protected function getTableQuery(): Builder
    {
        return Setting::query()->latest();
    }
}
