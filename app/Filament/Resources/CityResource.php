<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CityResource\Pages;
use App\Filament\Resources\CityResource\RelationManagers;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Collection;

class CityResource extends Resource {
	
	protected static ?string $model = City::class;
	
	protected static ?string $navigationIcon  = 'heroicon-o-location-marker';
	protected static ?string $navigationGroup = 'Location';
	protected static ?int    $navigationSort  = 13;
	
	public static function form (Form $form): Form {
		return $form
			->schema([
				         Forms\Components\BelongsToSelect::make('country_id')
					         ->relationship('country', 'name')
					         ->label('Country')
					         ->options(Country::select('id', 'name')
						                   ->pluck('name', 'id')
						                   ->toArray())
					         ->reactive()
					         ->afterStateHydrated(fn (callable $set) => $set('state_id', null))
					         ->required()
					         ->exists('countries', 'id'),
				
				         Forms\Components\BelongsToSelect::make('state_id')
					         ->relationship('state', 'name')
					         ->label('State')
					         ->options(function (callable $get) {
						         $country = $get('country_id');
						         if ( !$country ) {
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
					         ->required()
					         ->maxLength(255)
					         ->columnSpan(2),
			         ]);
	}
	
	public static function table (Table $table): Table {
		return $table
			->columns([
				          Tables\Columns\TextColumn::make('name')
					          ->searchable()
					          ->sortable()
					          ->toggleable(),
				
				          Tables\Columns\TextColumn::make('state.name')
					          ->searchable()
					          ->sortable()
					          ->toggleable(),
				
				          Tables\Columns\TextColumn::make('country.name')
					          ->searchable()
					          ->sortable()
					          ->toggleable(),
			          ])
			->filters([
				          //
			          ])
			->bulkActions([
				              Tables\Actions\BulkAction::make('delete')
					              ->action(fn (Collection $records) => $records->each(fn (City $record) => $record->delete()))
					              ->icon('heroicon-o-trash')
					              ->requiresConfirmation()
					              ->color('danger'),
			              ]);;
	}
	
	public static function getRelations (): array {
		return [
			//
		];
	}
	
	public static function getPages (): array {
		return [
			'index' => Pages\ListCities::route('/'),
			'create' => Pages\CreateCity::route('/create'),
			'edit' => Pages\EditCity::route('/{record}/edit'),
		];
	}
}
