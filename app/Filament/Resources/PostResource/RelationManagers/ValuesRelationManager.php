<?php

namespace App\Filament\Resources\PostResource\RelationManagers;

use Filament\Resources\Form;
use Filament\Resources\RelationManagers\BelongsToManyRelationManager;
use Filament\Resources\Table;
use function __;

class ValuesRelationManager extends BelongsToManyRelationManager {
	
	protected static string $relationship = 'values';
	
	protected static ?string $recordTitleAttribute = 'name';
	
	public static function form (Form $form): Form {
		return \App\Filament\Resources\AttributeResource\RelationManagers\ValuesRelationManager::form($form);
	}
	
	public static function table (Table $table): Table {
		return \App\Filament\Resources\AttributeResource\RelationManagers\ValuesRelationManager::table($table);
	}
	
	public static function getTitle (): string {
		return __('general.attribute_values.title_plural');
	}
	
	public static function getPluralRecordLabel (): string {
		return __('general.attribute_values.title_plural');
	}
}
