<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;

class RestoreController extends BaseController
{
    public function __invoke($user)
    {
        User::withTrashed()
            ->find($user)
            ->restore();

        return redirect()->route('admin.user.index')
            ->with('success', 'Пользователь успешно востановлен!');
    }
}
