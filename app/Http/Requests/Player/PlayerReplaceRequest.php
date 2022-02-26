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
            'email' => 'nullable',
            'main_language' => 'required|string|exists:languages,code',
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
        return [
            'main_language.required' => 'The main language is required.',
            'main_language.exists' => 'The main language is invalid.',
            'email.email' => 'The email is invalid.',
            'languages.required' => 'The languages are required.',
            'languages.array' => 'The languages must be an array.',
            'languages.*.required' => 'The languages must be an array.',
            'languages.*.exists' => 'The languages are invalid.',
            'providers.required' => 'The providers are required.',
            'providers.array' => 'The providers must be an array.',
            'providers.*.provider_type.required' => 'The provider type is required.',
            'providers.*.provider_type.exists' => 'The provider type is invalid.',
            'providers.*.uuid.required' => 'The provider uuid is required.',
            'providers.*.uuid.unique' => 'The provider uuid is already in use.',
            'providers.*.last_username.required' => 'The provider last username is required.',
            'providers.*.previous_username.string' => 'The provider previous username must be a string.',
        ];
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
