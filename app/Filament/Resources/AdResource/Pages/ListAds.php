<?php

namespace App\Filament\Resources\AdResource\Pages;

use App\Events\AdPublishStatusChangedEvent;
use App\Filament\Resources\AdResource;
use App\Models\Ad;
use App\Models\Scopes\AdNotExpiredScope;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use function __;
use function auth;
use function broadcast;
use function now;

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
                ->action(function(Ad $record) {
                    broadcast(new AdPublishStatusChangedEvent($record))->toOthers();

                    return $record->update(
                        [
                            'is_published' => ! $record->is_published,
                            'published_at' => ! $record->is_published ? now()->toDateTimeString() : null,
                        ]);
                }),
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
                ->action(fn(Collection $records) => $records->each(function($record) {
                    broadcast(new AdPublishStatusChangedEvent($record));

                    return $record->update(
                        [
                            'is_published' => ! $record->is_published,
                            'published_at' => ! $record->is_published ? now()->toDateTimeString() : null,
                        ]);
                }))
                ->deselectRecordsAfterCompletion()
                ->requiresConfirmation(),
            ...parent::getTableBulkActions(),
        ];
    }

    protected function getTableQuery(): Builder
    {
        return Ad::query()->latest('created_at')->withoutGlobalScope(AdNotExpiredScope::class);
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
