<?php

namespace App\Filament\Resources\StateResource\Pages;

use App\Filament\Resources\StateResource;
use App\Models\State;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListStates extends ListRecords
{
    protected static string $resource = StateResource::class;

    protected function getTableQuery(): Builder
    {
        return State::query()->latest();
    }
}
