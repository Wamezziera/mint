<?php

namespace App\Http\Requests;


class UserUpdateRequest extends AppRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'sometimes|string|min:5|max:120',
            'email' => 'sometimes|string|email|max:150|unique:users,email',
            'password' => 'sometimes|string|min:8|confirmed',
            'status'  => 'sometimes|integer',
            'role' => 'sometimes|string|min:5|max:50'
        ];
    }
}
