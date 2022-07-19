<?php

namespace App\Filament\Resources\StateResource\RelationManagers;

use App\Models\Country;
use App\Models\State;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use function __;

class DistrictsRelationManager extends RelationManager
{
    protected static string $relationship = 'districts';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('country_id')
                    ->relationship('country', 'name')
                    ->label(__('general.districts.fields.country_id'))
                    ->options(Country::select('id', 'name')
                        ->pluck('name', 'id')
                        ->toArray())
                    ->reactive()
                    ->afterStateHydrated(fn(callable $set) => $set('state_id', null))
                    ->required()
                    ->exists('countries', 'id'),

                Forms\Components\Select::make('state_id')
                    ->relationship('state', 'name')
                    ->label(__('general.districts.fields.state_id'))
                    ->options(function(callable $get) {
                        $country = $get('country_id');
                        if (! $country) {
                            State::select(['name', 'id', 'country_id'])
                                ->pluck('name', 'id', 'country_id')
                                ->toArray();
                        }

                        return State::select(['id', 'name'])
                            ->whereCountryId($country)
                            ->get()
                            ->pluck('name', 'id')
                            ->toArray();
                    })
                    ->required()
                    ->exists('states', 'id'),

                Forms\Components\TextInput::make('name')
                    ->label(__('general.districts.fields.name'))
                    ->required()
                    ->maxLength(255)
                    ->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('general.districts.fields.name'))
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('state.name')
                    ->label(__('general.districts.fields.state_id'))
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('country.name')
                    ->label(__('general.districts.fields.country_id'))
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
        return __('general.districts.title_plural');
    }

    protected static function getRecordLabel(): ?string
    {
        return __('general.districts.title');
    }

    public static function getPluralRecordLabel(): string
    {
        return __('general.districts.title_plural');
    }
}
