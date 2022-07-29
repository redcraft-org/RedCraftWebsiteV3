<?php

namespace App\Http\Requests\Player;

use App\Models\Player;
use Illuminate\Http\Response;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

use Illuminate\Validation\Factory as ValidationFactory;

class PlayerCreateRequest extends FormRequest
{

    /**
     * Constructor
     *
     * @return bool
     */
    public function __construct(ValidationFactory $validationFactory)
    {
        parent::__construct();
        $validationFactory->extend('unique_provider_uuid', function ($attribute, $value, $parameters, $validator) {
            return empty(Player::getPlayerByProviderUuid($value));
        });
    }



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
        return Player::$validationRules;
    }

    public function  messages()
    {
        return Player::$validationMessages;
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
