<?php

namespace App\Filament\Resources\CategoryResource\RelationManagers;

use App\Filament\Resources\AttributeResource;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\BelongsToManyRelationManager;
use Filament\Resources\Table;
use function __;

class AttributesRelationManager extends BelongsToManyRelationManager {
	
	protected static string $relationship = 'attributes';
	
	protected static ?string $recordTitleAttribute = 'name';
	
	public static function form (Form $form): Form {
		return AttributeResource::form($form);
	}
	
	public static function table (Table $table): Table {
		return AttributeResource::table($table);
		
	}
	
	public static function getRecordLabel (): string {
		return __('general.attributes.title');
	}
	
	public static function getPluralRecordLabel (): string {
		return __('general.attributes.title_plural');
	}
}
