<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostService
{
    public function store($request)
    {
        try{
            DB::beginTransaction();
            $data = [
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'category_id' => $request->input('category'),
                'preview_image' => $request->file('preview_image')->store('posts', 'images'),
                'main_image' => $request->file('main_image')->store('posts', 'images')
            ];

            $post = Post::firstOrCreate($data);

            $post->tags()->sync($request->input('tags'));
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            abort(500);
        }
    }

    public function update($request, $post)
    {
        try{
            DB::beginTransaction();
            $post->title = $request->input('title');
            $post->content = $request->input('content');
            $post->category_id = $request->input('category');

            if ($request->file('preview_image')) {
                $post->preview_image = $request->file('preview_image')->store('posts', 'images');
            }

            if($request->file('main_image')){
                $post->main_image = $request->file('main_image')->store('posts', 'images');
            }

            $post->save();

            $post->tags()->sync($request->input('tags'));
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            abort(500);
        }
    }
}
