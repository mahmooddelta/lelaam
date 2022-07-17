<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CurrencyResource\Pages;
use App\Filament\Resources\CurrencyResource\RelationManagers;
use App\Models\Currency;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use function __;

class CurrencyResource extends Resource {
	
	protected static ?string $model = Currency::class;
	
	protected static ?string $navigationIcon       = 'heroicon-o-currency-dollar';
	protected static ?int    $navigationSort       = 999;
	protected static ?string $recordTitleAttribute = 'name';
	
	public static function form (Form $form): Form {
		return $form
			->schema([
				         TextInput::make('name')
					         ->label(__('general.currencies.fields.name'))
					         ->required(),
				         TextInput::make('symbol')
					         ->label(__('general.currencies.fields.symbol'))
					         ->required(),
				         Toggle::make('is_active')
					         ->label(__('general.currencies.fields.is_active'))
					         ->default(true),
			         ]);
	}
	
	public static function table (Table $table): Table {
		return $table
			->columns([
				          TextColumn::make('symbol')
					          ->label(__('general.currencies.fields.name'))
					          ->searchable(),
				          TextColumn::make('name')
					          ->label(__('general.currencies.fields.symbol'))
					          ->searchable(),
				          BooleanColumn::make('is_active')
					          ->label(__('general.currencies.fields.is_active')),
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
			'index' => Pages\ListCurrencies::route('/'),
			'create' => Pages\CreateCurrency::route('/create'),
			'edit' => Pages\EditCurrency::route('/{record}/edit'),
		];
	}
	
	public static function getLabel (): string {
		return __('general.currencies.title');
	}
	
	public static function getPluralLabel (): string {
		return __('general.currencies.title_plural');
	}
	
	protected static function getNavigationGroup (): ?string {
		return __('nav.setting');
	}
}
