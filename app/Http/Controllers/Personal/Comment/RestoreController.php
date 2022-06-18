<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;

class RestoreController extends Controller
{
    public function __invoke(Comment $comment)
    {
        $comment->withTrashed()
            ->find($comment)
            ->restore();

        return redirect()->route('personal.comment')->with('success', 'Комментарий успешно удален!');
    }
}
