<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use function view;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('admin.categories.index');
    }
}
