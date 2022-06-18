<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Comment;

class DeleteController extends BaseController
{
    public function __invoke(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('admin.post.index')
            ->with('success', 'Пост успешно удален!');
    }
}
