<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use App\Models\Attribute;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;
use function collect;
use function strlen;
use function substr;

class CreatePost extends CreateRecord {
	
	protected static string $resource = PostResource::class;
	
	protected function afterCreate (): void {
		collect($this->data)
			->each(function ($value, $key) use (&$attribute_values, &$attributes) {
				if ( Str::startsWith($key, 'values_') ) {
					$attribute_values[] = [
						'attribute_id' => Attribute::whereName(substr($key, strlen("values_")))
							->first()
							->value('id'),
						'attribute_value_id' => $value,
					];
				} elseif ( Str::startsWith($key, 'attributes_') ) {
					$attributes[Attribute::whereName(substr($key, strlen("attributes_")))
						->first()
						->value('id')] = $value;
				}
			});
		if ( isset($attribute_values) ) {
			$this->record->values()
				->sync($attribute_values);
		}
		if ( isset($attributes) ) {
			$this->record->attributes()
				->sync($attributes);
		}
	}
}
