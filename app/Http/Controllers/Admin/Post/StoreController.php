<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = [
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'category_id' => $request->input('category'),
            'preview_image' => $request->file('preview_image')->store('posts', 'images'),
            'main_image' => $request->file('main_image')->store('posts', 'images')
        ];

        Post::firstOrCreate($data);

        return redirect()
            ->route('admin.post.index')
            ->with('success', 'Пост успешно создан!');
    }
}
