<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, User $user)
    {
        $this->service->update($request, $user);

        return redirect()->route('admin.user.index')
            ->with('success', 'Пользователь успешно обновлен!');
    }
}
