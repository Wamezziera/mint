<?php

namespace App\Http\Requests;


class TaskUpdateRequest extends AppRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:1|max:50|unique:categories,name'
        ];
    }
}
