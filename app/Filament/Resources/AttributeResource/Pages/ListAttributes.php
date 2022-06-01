<?php

namespace App\Filament\Resources\AttributeResource\Pages;

use App\Filament\Resources\AttributeResource;
use App\Models\Attribute;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListAttributes extends ListRecords
{
    protected static string $resource = AttributeResource::class;

    protected function getTableQuery(): Builder
    {
        return Attribute::query()->latest();
    }
}
