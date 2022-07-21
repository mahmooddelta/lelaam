<?php

namespace App\Filament\Resources\ReportTypeResource\Pages;

use App\Filament\Resources\ReportTypeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageReportTypes extends ManageRecords
{
    protected static string $resource = ReportTypeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
