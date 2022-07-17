<?php

namespace App\Filament\Resources\AdResource\RelationManagers;

use App\Filament\Resources\AttributeResource;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\BelongsToManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;
use function __;

class AttributesRelationManager extends BelongsToManyRelationManager
{

    protected static string $relationship = 'attributes';

    protected static ?string $recordTitleAttribute = 'name';

    protected static bool $shouldPreloadAttachFormRecordSelectOptions = true;

    protected function getEditFormSchema(): array
    {
        return [
            TextInput::make('value')
                ->label(__('general.ads.relations.attributes.value'))
                ->required(),
        ];
    }

    protected function getAttachFormSchema(): array
    {
        return [
            ...parent::getAttachFormSchema(),
            TextInput::make('value')
                ->label(__('general.ads.relations.attributes.value'))
                ->required(),
        ];
    }

    public static function form(Form $form): Form
    {
        return AttributeResource::form($form);
    }

    protected function canCreate(): bool
    {
        return false;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                          TextColumn::make('name')
                              ->label(__('general.ads.relations.attributes.attribute_id'))
                              ->searchable()
                              ->sortable(),
                          TextColumn::make('value')
                              ->label(__('general.ads.relations.attributes.value'))
                              ->searchable()
                              ->sortable(),
                      ])
            ->filters([
                          //
                      ]);
    }

    public static function getTitle(): string
    {
        return __('general.attributes.title_plural');
    }

    public static function getPluralRecordLabel(): string
    {
        return __('general.attributes.title_plural');
    }
}
