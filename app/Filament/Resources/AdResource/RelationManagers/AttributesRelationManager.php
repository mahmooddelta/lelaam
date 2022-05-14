<?php

namespace App\Filament\Resources\AdResource\RelationManagers;

use App\Filament\Resources\AttributeResource;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\BelongsToManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;
use function __;

class AttributesRelationManager extends BelongsToManyRelationManager
{

    protected static string $relationship = 'attributes';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return AttributeResource::form($form);
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
