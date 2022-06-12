<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Category $category)
    {
        $this->service->update($request, $category);

        return redirect()->route('admin.category.index')
            ->with('success', 'Категория успешно обновлена!');
    }
}
