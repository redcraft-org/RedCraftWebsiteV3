<?php

namespace App\Http\Requests\Url;

use Illuminate\Http\Response;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class UrlCreateRequest extends FormRequest
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
        // check the token only contains lowercase letters and numbers
        $tokenRegex = '/^[a-z0-9]+$/';
        return [
            'url' => 'required|url',
            'token' => 'nullable|string|max:'.config('url.max_token_length').'|regex:'.$tokenRegex.'|unique:short_urls,token',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator, response()->json([
                'errors' => $validator->errors()
            ],
            Response::HTTP_UNPROCESSABLE_ENTITY
        ));
    }
}
