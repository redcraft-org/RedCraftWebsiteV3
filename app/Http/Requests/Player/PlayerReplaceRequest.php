<?php

namespace App\Http\Requests\Player;

use App\Models\Player;
use Illuminate\Http\Response;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

use Illuminate\Validation\Factory as ValidationFactory;


class PlayerReplaceRequest extends FormRequest
{

    /**
     * Constructor
     *
     * @return bool
     */
    public function __construct(ValidationFactory $validationFactory)
    {
        parent::__construct();
    }



    public function passedValidation()
    {
        $this->replace($this->except('uuid'));
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
        return [
            'main_language' => 'required|string|exists:languages,code',
            'email' => 'nullable|email|unique:players',
            'languages' => 'required|array',
            'languages.*' => 'required|string|exists:languages,code',
            'providers' => 'required|array',
            'providers.*.provider_name' => 'required|string|exists:providers,name',
            'providers.*.uuid' => 'required|string',
            'providers.*.last_username' => 'required|string',
            'providers.*.previous_username' => 'nullable|string',
        ];

    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function  messages()
    {
        return Player::$validationMessages;
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator, response()->json(
            [
                'errors' => $validator->errors()
            ],
            Response::HTTP_UNPROCESSABLE_ENTITY
        ));
    }
}
