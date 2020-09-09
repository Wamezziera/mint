<?php

namespace App\Http\Requests;


class TaskCreateRequest extends AppRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:50|min:1|unique:categories,name'
        ];
    }
}
