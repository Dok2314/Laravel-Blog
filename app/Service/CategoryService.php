<?php

namespace App\Service;

use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryService
{
    public function store($request)
    {
        try{
            DB::beginTransaction();
            $data = $request->validated();

            Category::firstOrCreate($data);
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            abort(500);
        }
    }

    public function update($request, $category)
    {
        try{
            DB::beginTransaction();
            $category->title = $request->input('title');

            $category->save();
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            abort(500);
        }
    }
}
