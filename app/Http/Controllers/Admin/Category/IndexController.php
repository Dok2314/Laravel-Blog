<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class IndexController extends Controller
{
    public function __invoke()
    {
        $categories = Category::withTrashed()
            ->paginate(4);

        return view('admin.categories.index', compact('categories'));
    }
}
