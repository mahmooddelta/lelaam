<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use App\Models\Category;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use function __;
use function auth;

class ListCategories extends ListRecords
{
    protected static string $resource = CategoryResource::class;

    protected function getTableActions(): array
    {
        return [
            Action::make('status')
                ->label(__('general.actions.status'))
                ->icon('heroicon-o-refresh')
                ->color('primary')
                ->visible(fn(Category $record): bool => auth()->user()->can('update', $record))
                ->action(fn(Category $record) => $record->update(['is_visible' => ! $record->is_visible])),
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
                ->visible(fn(Category $record): bool => auth()->user()->can('update', $record))
                ->action(fn(Collection $records) => $records->each(fn($record) => $record->update(['is_visible' => ! $record->is_visible])))
                ->deselectRecordsAfterCompletion()
                ->requiresConfirmation(),
            ...parent::getTableBulkActions(),
        ];
    }

    protected function getTableQuery(): Builder
    {
        return Category::query()->latest();
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
