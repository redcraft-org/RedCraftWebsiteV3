<?php

namespace App\Http\Requests\PlayerMail;

use App\Models\PlayerMail;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class PlayerMailUpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return PlayerMail::$validationRules;
    }

    public function messages()
    {
        return PlayerMail::$validationMessages;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator, response()->json([
            'errors' => $validator->errors(),
        ],
            Response::HTTP_UNPROCESSABLE_ENTITY
        ));
    }
}
