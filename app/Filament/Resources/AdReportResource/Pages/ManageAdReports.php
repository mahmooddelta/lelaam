<?php

namespace App\Filament\Resources\AdReportResource\Pages;

use App\Filament\Resources\AdReportResource;
use Filament\Resources\Pages\ManageRecords;

class ManageAdReports extends ManageRecords
{
    protected static string $resource = AdReportResource::class;

    protected function getTableFiltersFormColumns(): int|array
    {
        return 2;
    }

    protected function getTableFiltersFormWidth(): string
    {
        return '4xl';
    }
}
