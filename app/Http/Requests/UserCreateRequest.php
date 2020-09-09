<?php

namespace App\Http\Requests;


class UserCreateRequest extends AppRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:5|max:120',
            'email' => 'required|string|email|max:150|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'status' => 'required|integer',
            'role' => 'sometimes|string|min:5|max:50'
        ];
    }
}
