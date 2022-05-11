<?php

namespace App\Filament\Resources\CategoryResource\RelationManagers;

use App\Filament\Resources\CategoryResource;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\HasManyRelationManager;
use Filament\Resources\Table;
use function __;

class ChildrenRelationManager extends HasManyRelationManager {
	
	protected static string $relationship = 'children';
	
	protected static ?string $recordTitleAttribute = 'name';
	
	public static function form (Form $form): Form {
		return CategoryResource::form($form);
	}
	
	public static function table (Table $table): Table {
		return CategoryResource::table($table);
	}
	
	public static function getRecordLabel (): string {
		return __('general.categories.relations.child');
	}
	
	public static function getPluralRecordLabel (): string {
		return __('general.categories.relations.children');
	}
}
