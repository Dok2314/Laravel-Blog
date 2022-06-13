<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $users = User::withTrashed()
            ->orderBy('created_at', 'DESC')
            ->paginate(4);

        return view('admin.users.index', compact('users'));
    }
}
