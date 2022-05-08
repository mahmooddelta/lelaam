<?php

namespace App\Filament\Resources;

use App\Enums\FrontEndTypes;
use App\Filament\Resources\AttributeResource\Pages;
use App\Filament\Resources\AttributeResource\RelationManagers;
use App\Models\Attribute;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Validation\Rule;
use function __;
use function array_keys;

class AttributeResource extends Resource {
	
	protected static ?string $model = Attribute::class;
	
	protected static ?string $navigationIcon       = 'heroicon-o-view-list';
	protected static ?int    $navigationSort       = 2;
	protected static ?string $recordTitleAttribute = 'name';
	
	public Attribute $attribute;
	
	public static function form (Form $form): Form {
		return $form
			->schema([
				         Forms\Components\TextInput::make('name')
					         ->label(__('general.attributes.fields.name'))
					         ->required()
					         ->maxLength(191),
				         Forms\Components\Select::make('frontend_type')
					         ->options(Attribute::FRONT_END_TYPES)
					         ->label(__('general.attributes.fields.front_end_type'))
					         ->required()
					         ->rules([
						                 Rule::in(array_keys(Attribute::FRONT_END_TYPES)),
					                 ]),
				         Forms\Components\Toggle::make('is_active')
					         ->label(__('general.attributes.fields.is_active'))
					         ->helperText(__('general.status_helper'))
					         ->default(true),
			         ]);
	}
	
	public static function table (Table $table): Table {
		return $table
			->columns([
				          Tables\Columns\TextColumn::make('name'),
				          Tables\Columns\BooleanColumn::make('is_active'),
			          ])
			->filters([
				          //
			          ]);
	}
	
	public static function getRelations (): array {
		return [
			RelationManagers\ValuesRelationManager::class,
		];
	}
	
	
	public static function getLabel (): string {
		return __('general.attributes.title');
	}
	
	public static function getPluralLabel (): string {
		return __('general.attributes.title_plural');
	}
	
	protected static function getNavigationGroup (): ?string {
		return __('nav.leelam');
	}
	
	public static function getPages (): array {
		return [
			'index' => Pages\ListAttributes::route('/'),
			'create' => Pages\CreateAttribute::route('/create'),
			'edit' => Pages\EditAttribute::route('/{record}/edit'),
		];
	}
}
