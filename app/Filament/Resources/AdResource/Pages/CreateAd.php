<?php

namespace App\Filament\Resources\AdResource\Pages;

use App\Filament\Resources\AdResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Arr;
use function is_null;

class CreateAd extends CreateRecord
{
    protected static string $resource = AdResource::class;

    protected function afterCreate(): void
    {
        if (Arr::has($this->data, 'values') && ! is_null($this->record)) {
            $values = [];
            foreach (Arr::get($this->data, 'values') as $key => $value) {
                $values[] = [
                    'attribute_id' => $key,
                    'attribute_value_id' => $value,
                ];
            }
            $this->record->values()
                ->sync($values);
        }
        if (Arr::has($this->data, 'attributes') && ! is_null($this->record)) {
            $attributes = [];
            foreach (Arr::get($this->data, 'attributes') as $key => $attribute) {
                $attributes[] = [
                    'attribute_id' => $key,
                    'value' => $attribute,
                ];
            }
            $this->record->attributes()
                ->sync($attributes);
        }
    }

}
