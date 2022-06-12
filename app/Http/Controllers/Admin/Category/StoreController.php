<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Requests\Admin\Category\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $this->service->store($request);

        return redirect()
            ->route('admin.category.index')
            ->with('success', 'Категория успешно создана!');
    }
}
