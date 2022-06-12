<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;

class ShowController extends BaseController
{
    public function __invoke(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }
}
