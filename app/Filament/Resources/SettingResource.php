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
use function __;

class SettingResource extends Resource {
	
	protected static ?string $model = Setting::class;
	
	protected static ?string $navigationIcon       = 'heroicon-o-cog';
	protected static ?int    $navigationSort       = 1000;
	protected static ?string $recordTitleAttribute = 'key';
	
	public static function form (Form $form): Form {
		return $form
			->schema([
				         Forms\Components\TextInput::make('key')
					         ->label(__('general.settings.fields.key'))
					         ->required()
					         ->maxLength(255),
				         Forms\Components\TextInput::make('value')
					         ->label(__('general.settings.fields.value'))
					         ->maxLength(255),
			         ]);
	}
	
	public static function table (Table $table): Table {
		return $table
			->columns([
				          Tables\Columns\TextColumn::make('key')
					          ->label(__('general.settings.fields.key')),
				          Tables\Columns\TextColumn::make('value')
					          ->label(__('general.settings.fields.value')),
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
	
	public static function getLabel (): string {
		return __('general.settings.title');
	}
	
	public static function getPluralLabel (): string {
		return __('general.settings.title_plural');
	}
	
	protected static function getNavigationGroup (): ?string {
		return __('nav.setting');
	}
	
	public static function getPages (): array {
		return [
			'index' => Pages\ListSettings::route('/'),
			'create' => Pages\CreateSetting::route('/create'),
			'edit' => Pages\EditSetting::route('/{record}/edit'),
		];
	}
}
