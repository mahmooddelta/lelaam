<?php

namespace App\Http\Requests\Chat;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
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
            'message' => ['required', 'filled'],
        ];
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

            throw new \Illuminate\Http\Exceptions\HttpResponseException($response);
        }

        return parent::failedValidation($validator);
    }
}
