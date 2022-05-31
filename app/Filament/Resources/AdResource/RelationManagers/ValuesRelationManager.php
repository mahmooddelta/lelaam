<?php

namespace App\Filament\Resources\AdResource\RelationManagers;

use App\Models\Attribute;
use App\Models\AttributeValue;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Forms\Components\Select;
use Filament\Resources\RelationManagers\BelongsToManyRelationManager;
use Filament\Resources\Table;
use function __;
use function is_null;

class ValuesRelationManager extends BelongsToManyRelationManager
{

    protected static string $relationship = 'values';

    protected static ?string $recordTitleAttribute = 'name';

    protected static bool $shouldPreloadAttachFormRecordSelectOptions = true;

    protected function canCreate(): bool
    {
        return false;
    }

    protected function getAttachFormSchema(): array
    {
        return [
            BelongsToSelect::make('attribute_id')
                ->relationship('attribute', 'name')
                ->label(__('general.attributes.title'))
                ->options(Attribute::whereFrontendType('select')->pluck('name', 'id')->toArray())
                ->reactive(),
            Select::make('recordId')
                ->label(__('general.attribute_values.title'))
                ->options(function (callable $get) {
                    $attribute = $get('attribute_id');
                    if ($attribute) {
                        return AttributeValue::whereAttributeId($attribute)->pluck('name', 'id')->toArray();
                    }

                    return [];
                })->visible(fn(callable $get): bool => ! is_null($get('attribute_id'))),
        ];
    }

    public static function table(Table $table): Table
    {
        return \App\Filament\Resources\AttributeResource\RelationManagers\ValuesRelationManager::table($table);
    }

    public static function getTitle(): string
    {
        return __('general.attribute_values.title_plural');
    }

    public static function getPluralRecordLabel(): string
    {
        return __('general.attribute_values.title_plural');
    }
}
