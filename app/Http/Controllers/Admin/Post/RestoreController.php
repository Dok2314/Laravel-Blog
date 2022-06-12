<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class RestoreController extends Controller
{
    public function __invoke($post)
    {
        Post::withTrashed()
            ->find($post)
            ->restore();

        return redirect()->route('admin.post.index')
            ->with('success', 'Пост успешно востановлен!');
    }
}
