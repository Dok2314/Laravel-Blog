<?php

namespace App\Service;

use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class TagService
{
    public function store($data)
    {
        try{
            DB::beginTransaction();
            Tag::firstOrCreate($data);
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            abort(500);
        }
    }

    public function update($request, $tag)
    {
        try{
            DB::beginTransaction();
            $tag->title = $request->input('title');

            $tag->save();
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            abort(500);
        }
    }
}
