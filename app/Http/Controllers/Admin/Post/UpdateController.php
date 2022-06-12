<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->category_id = $request->input('category');

        $post->save();

        return redirect()->route('admin.post.index')
            ->with('success', 'Пост успешно обновлен!');
    }
}
