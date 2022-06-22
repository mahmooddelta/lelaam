<?php

namespace App\Http\Requests\Ad\Api;

use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\District;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;
use function request;
use function response;

class StoreRequest extends FormRequest
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
    public function rules()
    {
        return [
            'title' => [
                'required',
                'string',
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
                'integer',
                'min:0',
                'exists:categories,id',
            ],
            'currency_id' => [
                'sometimes',
                'required',
                'numeric',
                'min:0',
            ],
            'price' => [
                'required_unless:currency_id,0',
                'min:0',
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
            ],
            'images.*' => [
                'required_with:images',
                'image',
                'mimes:jpeg,png,jpg,gif,svg',
                'max:5100',
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

    protected function failedValidation(Validator $validator)
    {
        if (request()->is('api/*')) {
            $errors = $validator->errors();

            $response = response()->json([
                                             'status' => 'error',
                                             'status_code' => Response::HTTP_UNPROCESSABLE_ENTITY,
                                             'message' => $errors->messages(),
                                         ], Response::HTTP_UNPROCESSABLE_ENTITY);

            throw new HttpResponseException($response);
        }

        return parent::failedValidation($validator);
    }
}
