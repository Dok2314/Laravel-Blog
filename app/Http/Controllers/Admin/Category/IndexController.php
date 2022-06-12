<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $categories = Category::withTrashed()
            ->orderBy('created_at', 'DESC')
            ->paginate(4);

        return view('admin.categories.index', compact('categories'));
    }
}
