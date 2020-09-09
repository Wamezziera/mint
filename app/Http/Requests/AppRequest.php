<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppRequest extends FormRequest
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
        return [
            //
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages()
    {
        return [
            'required'  => 'The attribute field is required!',
            'unique'    => 'The attribute already registered!',
            'string'    => ': attribute must be type string',
            'boolean'   => ': attribute must be type boolean',
            'exists'    => ': attribute does not exist!',
            'min'       => ': attribute must be at least: min characters',
            'max'       => ': attribute must be at most: max characters',
            'email'     => ': attribute must have email format',
            'confirmed' => 'Password did not match confirmation',
            'integer'   => ': attribute must be of type int'
        ];
    }
}
