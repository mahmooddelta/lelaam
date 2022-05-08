<?php

namespace App\Filament\Resources\CategoryResource\RelationManagers;

use App\Models\Attribute;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\BelongsToManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Validation\Rule;
use function __;
use function array_keys;

class AttributesRelationManager extends BelongsToManyRelationManager {
	
	protected static string $relationship = 'attributes';
	
	protected static ?string $recordTitleAttribute = 'name';
	
	public static function form (Form $form): Form {
		return $form
			->schema([
				         TextInput::make('name')
					         ->label(__('general.attributes.fields.name'))
					         ->required()
					         ->maxLength(191),
				         Select::make('frontend_type')
					         ->options(Attribute::FRONT_END_TYPES)
					         ->label(__('general.attributes.fields.front_end_type'))
					         ->required()
					         ->rules([
						                 Rule::in(array_keys(Attribute::FRONT_END_TYPES)),
					                 ]),
				         Toggle::make('is_active')
					         ->label(__('general.attributes.fields.is_active'))
					         ->helperText(__('general.status_helper'))
					         ->default(true),
			         ]);
	}
	
	public static function table (Table $table): Table {
		return $table
			->columns([
				          Tables\Columns\TextColumn::make('name')
					          ->label(__('general.attributes.fields.name')),
			          ])
			->filters([
				          //
			          ]);
		
	}
	
	public static function getRecordLabel (): string {
		return __('general.attributes.title');
	}
	
	public static function getPluralRecordLabel (): string {
		return __('general.attributes.title_plural');
	}
}
