<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::withTrashed()
            ->paginate(4);

        return view('admin.posts.index', compact('posts'));
    }
}
