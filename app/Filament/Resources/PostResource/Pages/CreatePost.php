<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use App\Models\Attribute;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Arr;
use function is_null;

class CreatePost extends CreateRecord {
	
	protected static string $resource = PostResource::class;
	
	protected function afterCreate (): void {
		if ( Arr::has($this->data, 'values') && !is_null(Arr::get($this->data, 'values')) ) {
			$values = [];
			foreach ( Arr::get($this->data, 'values') as $key => $value ) {
				$values[] = [
					'attribute_id' => Attribute::whereName($key)
						->first()
						->value('id'),
					'attribute_value_id' => $value,
				];
			}
			$this->record->values()
				->sync($values);
		}
		if ( Arr::has($this->data, 'attributes') && !is_null(Arr::get($this->data, 'attributes')) ) {
			$attributes = [];
			foreach ( Arr::get($this->data, 'attributes') as $key => $attribute ) {
				$attributes[] = [
					'attribute_id' => Attribute::find($key)
						?->first()
						?->value('id'),
					'value' => $attribute,
				];
			}
			$this->record->attributes()
				->sync($attributes);
		}
	}
}
