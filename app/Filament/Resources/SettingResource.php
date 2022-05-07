<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Filament\Resources\SettingResource\RelationManagers;
use App\Models\Setting;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class SettingResource extends Resource {
	
	protected static ?string $model = Setting::class;
	
	protected static ?string $navigationIcon       = 'heroicon-o-cog';
	protected static ?int    $navigationSort       = 31;
	protected static ?string $navigationGroup      = 'settings';
	protected static ?string $recordTitleAttribute = 'key';
	
	public static function form (Form $form): Form {
		return $form
			->schema([
				         Forms\Components\TextInput::make('key')
					         ->required()
					         ->maxLength(255),
				         Forms\Components\TextInput::make('value')
					         ->maxLength(255),
			         ]);
	}
	
	public static function table (Table $table): Table {
		return $table
			->columns([
				          Tables\Columns\TextColumn::make('key'),
				          Tables\Columns\TextColumn::make('value'),
				          Tables\Columns\TextColumn::make('created_at')
					          ->formatStateUsing(fn (Setting $record) => $record->created_at->diffForHumans()),
				          Tables\Columns\TextColumn::make('updated_at')
					          ->formatStateUsing(fn (Setting $record) => $record->updated_at->diffForHumans()),
			          ])
			->filters([
				          //
			          ]);
	}
	
	public static function getRelations (): array {
		return [
			//
		];
	}
	
	public static function getPages (): array {
		return [
			'index' => Pages\ListSettings::route('/'),
			'create' => Pages\CreateSetting::route('/create'),
			'edit' => Pages\EditSetting::route('/{record}/edit'),
		];
	}
}
