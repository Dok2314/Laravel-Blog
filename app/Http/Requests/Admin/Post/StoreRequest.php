<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string'],
            'content' => ['required'],
            'category' => ['required', 'integer'],
            'preview_image' => ['required', 'file'],
            'main_image' => ['required', 'file'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['nullable', 'integer', 'exists:tags,id']
        ];
    }
}
