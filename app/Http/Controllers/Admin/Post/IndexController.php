<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $posts = Post::withTrashed()
            ->orderBy('created_at', 'DESC')
            ->paginate(4);

        return view('admin.posts.index', compact('posts'));
    }
}
