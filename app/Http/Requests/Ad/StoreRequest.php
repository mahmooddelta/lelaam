<?php

namespace App\Http\Requests\Ad;

use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\Currency;
use App\Models\District;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Spatie\MediaLibraryPro\Rules\Concerns\ValidatesMedia;

class StoreRequest extends FormRequest
{
    use ValidatesMedia;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => [
                'required',
                'string',
            ],
            'price' => [
                'required',
                'numeric',
                'min:0',
            ],
            'phone_number' => [
                'required',
                'string',
                'min:10',
                'max:14',
            ],
            'desc' => [
                'required',
                'string',
            ],
            'address' => [
                'required',
                'string',
            ],
            'category_id' => [
                'required',
            ],
            'currency_id' => [
                'sometimes',
                'required',
                'numeric',
                'min:0',
                Rule::exists(Currency::class, 'id'),
            ],
            'district_id' => [
                'required',
                'numeric',
                'min:0',
                Rule::exists(District::class, 'id'),
            ],
            'is_chat_enabled' => [
                'sometimes',
            ],
            'images' => [
                'nullable',
                $this->validateMultipleMedia()
                    ->extension(['png', 'jpeg', 'jpg'])
                    ->maxItems(5)
                    ->heightBetween(120, 1366)
                    ->widthBetween(120, 1366)
                    ->maxItemSizeInKb(5 * 1024),
            ],
            'attributes' => [
                'nullable',
            ],
            'attributes.*.attribute_id' => [
                'required_with:attributes',
                'numeric',
                'min:0',
                Rule::exists(Attribute::class, 'id'),
            ],
            'attributes.*.value' => [
                'required_with:attributes',
                'string',
            ],
            'values' => [
                'nullable',
            ],
            'values.*.attribute_id' => [
                'required_with:values',
                'numeric',
                'min:0',
                Rule::exists(Attribute::class, 'id'),
            ],
            'values.*.attribute_value_id' => [
                'required_with:values',
                'numeric',
                'min:0',
                Rule::exists(AttributeValue::class, 'id'),
            ],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
                         'category_id' => Category::whereSlug($this->category_id)
                             ->value('id'),
                     ]);
    }
}
