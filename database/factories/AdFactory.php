<?php

namespace Database\Factories;

use App\Models\Ad;
use App\Models\Attribute;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use function mt_rand;
use function now;

class AdFactory extends Factory
{
    protected $model = Ad::class;

    public function definition(): array
    {
        $title = $this->faker->persianWord();

        return [
            'title' => $title,
            'slug' => Str::persian_slug($title),
            'price' => $this->faker->randomNumber(5),
            'phone_number' => $this->faker->phoneNumber(),
            'desc' => $this->faker->persianText(),
            'address' => $this->faker->address(),
            'is_published' => $this->faker->boolean(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Ad $ad) {
            $attributesId = Attribute::select('id')
                ->pluck('id');
            $attributeValues = Attribute::with('values')->get()->pluck('values')
                ->flatten()
                ->pluck('id')
                ->toArray();

            $attributes = [];
            $values = [];
            $value = $this->faker->persianWord();

            for ($i = 0; $i < mt_rand(1, count($attributesId)); $i++) {
                $attributes[] = [
                    'attribute_id' => $this->faker->randomElement($attributesId),
                    'value' => $value,
                ];
            }

            for ($j = 0; $j < mt_rand(1, count($attributeValues)); $j++) {
                $values[] = [
                    'attribute_id' => $this->faker->randomElement($attributesId),
                    'attribute_value_id' => $this->faker->randomElement($attributeValues),
                ];
            }

            $ad->attributes()
                ->sync($attributes);
            $ad->values()
                ->sync($values);
        });
    }
}
