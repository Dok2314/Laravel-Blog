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

    public function messages()
    {
        return [
            'title.required' => 'Это поле должно быть заполнено!',
            'title.string' => 'Это поле должно соответствовать строковому типу!',
            'content.required' => 'Это поле должно быть заполнено!',
            'preview_image.required' => 'Это поле должно быть заполнено!',
            'preview_image.file' => 'Необходимо выбрать файл!',
            'main_image.required' => 'Это поле должно быть заполнено!',
            'main_image.file' => 'Необходимо выбрать файл!',
            'category.required' => 'Это поле должно быть заполнено!',
            'category.integer' => 'Это поле должно соответствовать строковому типу!',
            'tags.array' => 'Необходимо отправить массив данных!'
        ];
    }
}
