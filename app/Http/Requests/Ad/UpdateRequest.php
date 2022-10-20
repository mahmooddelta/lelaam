<?php

namespace App\Http\Requests\Ad;

use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\Currency;
use App\Models\District;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
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
    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'filled',
                'string',
            ],
            'phone_number' => [
                'required',
                'filled',
                'string',
                'min:10',
                'max:14',
            ],
            'desc' => [
                'required',
                'filled',
                'string',
            ],
            'address' => [
                'required',
                'filled',
                'string',
            ],
            'category_id' => [
                'required',
                'filled',
                'integer',
                'min:0',
                'exists:categories,id',
            ],
            'currency_id' => [
                'sometimes',
                'required',
                'filled',
                'numeric',
                'min:0',
            ],
            'price' => [
                'required_unless:currency_id,0',
                'min:0',
            ],
            'district_id' => [
                'required',
                'filled',
                'numeric',
                'min:0',
                Rule::exists(District::class, 'id'),
            ],
            'is_chat_enabled' => [
                'nullable',
            ],
            'is_sold' => [
                'sometimes',
            ],
            'images' => [
                'nullable',
            ],
            'images.*.uuid' => [
                'required_with:images',
                'string',
                'exists:media,uuid',
            ],
            'images.*.name' => [
                'required_with:images',
                'string',
                'exists:media,name',
            ],
            'images.*.extension' => [
                'required_with:images',
                'string',
                Rule::in(['jpeg', 'png', 'jpg', 'gif', 'svg']),
            ],
            'images.*.size' => [
                'required_with:images',
                'numeric',
                'max:' . 5 * 1024 * 1024,
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
            'district_id' => District::whereName($this->district_id)
                ->value('id'),
            'currency_id' => $this->currency_id !== 0 ? Currency::whereName($this->currency_id)->value('id') : 0,
        ]);
    }
}
