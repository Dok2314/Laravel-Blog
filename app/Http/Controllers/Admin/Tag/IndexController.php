<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Models\Tag;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $tags = Tag::withTrashed()
            ->orderBy('created_at', 'DESC')
            ->paginate(4);

        return view('admin.tags.index', compact('tags'));
    }
}
