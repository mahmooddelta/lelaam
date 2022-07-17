<?php

namespace App\Filament\Resources\AttributeResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\HasManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use function __;
use function in_array;

class ValuesRelationManager extends HasManyRelationManager {
	
	protected static string $relationship = 'values';
	
	protected static ?string $recordTitleAttribute = 'name';
	
	public static function form (Form $form): Form {
		return $form
			->schema([
				         Forms\Components\TextInput::make('name')
					         ->label(__('general.attribute_values.fields.name'))
					         ->required(),
				         Forms\Components\Hidden::make('attribute_id'),
				         Forms\Components\Toggle::make('is_active')
					         ->label(__('general.attribute_values.fields.is_active'))
					         ->default(true),
			         ]);
	}
	
	public static function table (Table $table): Table {
		return $table
			->columns([
				          TextColumn::make('attribute.name')
					          ->label(__('general.attribute_values.fields.attribute_id'))
					          ->searchable(),
						  
				          TextColumn::make('name')
					          ->label(__('general.attribute_values.fields.name'))
					          ->searchable()
					          ->sortable(),
						  
				          BooleanColumn::make('is_active')
					          ->label(__('general.attribute_values.fields.is_active'))
					          ->sortable(),
			          ])
			->filters([
				          Filter::make('is_active')
					          ->label(__('general.attribute_values.filters.visible'))
					          ->query(fn (Builder $query): Builder => $query->whereIsActive(true)),
				          Filter::make('not_active')
					          ->label(__('general.attribute_values.filters.not_visible'))
					          ->query(fn (Builder $query): Builder => $query->whereIsActive(false)),
			          ]);
	}
	
	public static function getTitle (): string {
		return __('general.attribute_values.title_plural');
	}
	
	public static function getPluralRecordLabel (): string {
		return __('general.attribute_values.title_plural');
	}
	
	public static function canViewForRecord (Model $ownerRecord): bool {
		return in_array($ownerRecord->frontend_type, ['select', 'color']);
	}
}
