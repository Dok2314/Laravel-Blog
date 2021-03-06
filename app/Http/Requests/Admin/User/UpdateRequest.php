<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'string', 'unique:users,email'],
            'role_id' => ['required', 'integer']
        ];
    }
}
