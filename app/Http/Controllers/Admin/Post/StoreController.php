<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\Admin\Post\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $this->service->store($request);

        return redirect()
            ->route('admin.post.index')
            ->with('success', 'Пост успешно создан!');
    }
}
