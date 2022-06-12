<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Tag;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Tag $tag)
    {
        $this->service->update($request, $tag);

        return redirect()->route('admin.tag.index')
            ->with('success', 'Тег успешно обновлен!');
    }
}
