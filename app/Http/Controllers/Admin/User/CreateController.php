<?php

namespace App\Http\Controllers\Admin\User;

class CreateController extends \App\Http\Controllers\Admin\User\BaseController
{
    public function __invoke()
    {
        return view('admin.users.create');
    }
}
