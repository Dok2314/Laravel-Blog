<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Models\Tag;

class RestoreController extends BaseController
{
    public function __invoke($tag)
    {
        Tag::withTrashed()
            ->find($tag)
            ->restore();

        return redirect()->route('admin.tag.index')
            ->with('success', 'Тег успешно востановлен!');
    }
}
