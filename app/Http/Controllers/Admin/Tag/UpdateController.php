<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Tag;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Tag $tag)
    {
        $tag->title = $request->input('title');

        $tag->save();

        return redirect()->route('admin.tag.index')
            ->with('success', 'Тег успешно обновлен!');
    }
}
