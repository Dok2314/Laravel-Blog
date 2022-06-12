<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $this->service->update($request, $post);

        return redirect()->route('admin.post.index')
            ->with('success', 'Пост успешно обновлен!');
    }
}
