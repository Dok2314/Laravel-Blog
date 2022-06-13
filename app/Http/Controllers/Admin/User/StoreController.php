<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Requests\Admin\User\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $this->service->store($request);

        return redirect()
            ->route('admin.user.index')
            ->with('success', 'Пользователь успешно создан!');
    }
}
