<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;

class RestoreController extends BaseController
{
    public function __invoke($category)
    {
        Category::withTrashed()
            ->find($category)
            ->restore();

        return redirect()->route('admin.category.index')
            ->with('success', 'Категория успешно востановлена!');
    }
}
