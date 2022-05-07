<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CountryResource\Pages;
use App\Filament\Resources\CountryResource\RelationManagers;
use App\Models\Country;
use Filament\Forms;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class CountryResource extends Resource {
	
	protected static ?string $model = Country::class;
	
	protected static ?string $navigationIcon  = 'heroicon-o-globe';
	protected static ?string $navigationGroup = 'Location';
	protected static ?int    $navigationSort  = 11;
	
	public static function form (Form $form): Form {
		return $form
			->schema([
				         Forms\Components\TextInput::make('name')
					         ->required()
					         ->maxLength(255),
				         Forms\Components\TextInput::make('phone_code')
					         ->tel()
					         ->required()
					         ->maxLength(5),
				         Forms\Components\TextInput::make('iso3')
					         ->required()
					         ->label('Country code ISO3')
					         ->helperText("It's the 3-letter code for the country like AFG")
					         ->maxLength(3),
				         Toggle::make('status')
					         ->label('Active')
					         ->default(true),
			         ]);
	}
	
	public static function table (Table $table): Table {
		return $table
			->columns([
				          Tables\Columns\TextColumn::make('name')
					          ->searchable()
					          ->sortable()
					          ->toggleable(),
				          Tables\Columns\BooleanColumn::make('status')
					          ->searchable()
					          ->sortable()
					          ->toggleable(),
				          Tables\Columns\TextColumn::make('phone_code')
					          ->searchable()
					          ->sortable()
					          ->toggleable(),
				          Tables\Columns\TextColumn::make('iso3')
					          ->searchable()
					          ->sortable()
					          ->toggleable(),
			          ])
			->filters([
				          Tables\Filters\Filter::make('status')
					          ->label('Active')
					          ->query(fn (Builder $query): Builder => $query->whereStatus(true)),
				          Tables\Filters\Filter::make('not_active')
					          ->label('Not Active')
					          ->query(fn (Builder $query): Builder => $query->whereStatus(false)),
			          ])
			->bulkActions([
				              Tables\Actions\BulkAction::make('delete')
					              ->action(fn (Collection $records) => $records->each(fn (Country $record) => $record->delete()))
					              ->icon('heroicon-o-trash')
					              ->requiresConfirmation()
					              ->color('danger'),
			              ]);
	}
	
	public static function getRelations (): array {
		return [
			//
		];
	}
	
	public static function getPages (): array {
		return [
			'index' => Pages\ListCountries::route('/'),
			'create' => Pages\CreateCountry::route('/create'),
			'edit' => Pages\EditCountry::route('/{record}/edit'),
		];
	}
}
