<?php

namespace App\Filament\Resources\AdResource\Pages;

use App\Filament\Resources\AdResource;
use App\Models\Ad;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use function __;
use function auth;

class ListAds extends ListRecords
{
    protected static string $resource = AdResource::class;

    protected function getTableActions(): array
    {
        return [
            Action::make('status')
                ->label(__('general.actions.status'))
                ->icon('heroicon-o-refresh')
                ->color('primary')
                ->visible(fn(Ad $record): bool => auth()->user()->can('update', $record))
                ->action(fn(Ad $record) => $record->update(['is_published' => ! $record->is_published])),
            ...parent::getTableActions(),
        ];
    }

    protected function getTableBulkActions(): array
    {
        return [
            BulkAction::make('status')
                ->label(__('general.actions.status'))
                ->icon('heroicon-o-refresh')
                ->color('primary')
                ->visible(fn(Ad $record): bool => auth()->user()->can('update', $record))
                ->action(fn(Collection $records) => $records->each(fn($record) => $record->update(['is_published' => ! $record->is_published])))
                ->deselectRecordsAfterCompletion(),
            ...parent::getTableBulkActions(),
        ];
    }

    protected function getTableQuery(): Builder
    {
        return Ad::query()->latest();
    }
}
