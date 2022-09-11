<?php

namespace App\Http\Requests\Skin;

use Illuminate\Http\Response;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

use Illuminate\Validation\Factory as ValidationFactory;

class SkinBodyRequest extends FormRequest
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

    public function validationData()
    {
        $this->merge([
            'uuid' => $this->route('uuid')
        ]);
        return $this->all();
    }


    public function passedValidation()
    {
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
            'uuid' => 'required|uuid',
            'scale' => 'nullable|numeric|min:1|max:32',
            'gear' => 'nullable|numeric|min:0|max:63',
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
            'uuid.required' => 'The uuid field is required.',
            'uuid.uuid' => 'The uuid field must be a valid uuid.',
            'scale.numeric' => 'The scale field must be a number.',
            'scale.min' => 'The scale field must be at least 1.',
            'scale.max' => 'The scale field may not be greater than 32.',
            'gear.numeric' => 'The gear field must be a number.',
            'gear.min' => 'The gear field must be at least 0.',
            'gear.max' => 'The gear field may not be greater than 63.',
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
