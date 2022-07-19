<?php

namespace App\Filament\Resources\CountryResource\RelationManagers;

use App\Models\Country;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use function __;

class StatesRelationManager extends RelationManager
{
    protected static string $relationship = 'states';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('country_id')
                    ->options(Country::select('id', 'name')
                        ->pluck('name', 'id')
                        ->toArray())
                    ->label(__('general.states.fields.country_id'))
                    ->required(),
                TextInput::make('name')
                    ->label(__('general.states.fields.name'))
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('general.states.fields.name'))
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('country.name')
                    ->label(__('general.states.fields.country_id'))
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getTitle(): string
    {
        return __('general.states.title_plural');
    }

    protected static function getRecordLabel(): ?string
    {
        return __('general.states.title');
    }

    public static function getPluralRecordLabel(): string
    {
        return __('general.states.title_plural');
    }
}
