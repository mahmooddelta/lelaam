<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StateResource\Pages;
use App\Filament\Resources\StateResource\RelationManagers;
use App\Models\Country;
use App\Models\State;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Collection;

class StateResource extends Resource {
	
	protected static ?string $model = State::class;
	
	protected static ?string $navigationIcon  = 'heroicon-o-map';
	protected static ?string $navigationGroup = 'Location';
	protected static ?int    $navigationSort  = 5;
	
	public static function form (Form $form): Form {
		return $form
			->schema([
				         Forms\Components\Select::make('country_id')
					         ->options(Country::select('id', 'name')
						                   ->pluck('name', 'id')
						                   ->toArray())
					         ->label('Country')
					         ->required(),
				         Forms\Components\TextInput::make('name')
					         ->required()
					         ->maxLength(255),
			         ]);
	}
	
	public static function table (Table $table): Table {
		return $table
			->columns([
				          Tables\Columns\TextColumn::make('name')
					          ->searchable()
					          ->sortable()
					          ->toggleable(),
				
				          Tables\Columns\TextColumn::make('country.name')
					          ->searchable()
					          ->sortable()
					          ->toggleable(),
			          ])
			->filters([
			
			          ])
			->bulkActions([
				              Tables\Actions\BulkAction::make('delete')
					              ->action(fn (Collection $records) => $records->each(fn (State $record) => $record->delete()))
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
			'index' => Pages\ListStates::route('/'),
			'create' => Pages\CreateState::route('/create'),
			'edit' => Pages\EditState::route('/{record}/edit'),
		];
	}
}
