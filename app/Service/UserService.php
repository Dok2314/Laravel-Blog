<?php

namespace App\Service;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function store($request)
    {
        try{
            DB::beginTransaction();
            $data = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password'))
            ];

            User::firstOrCreate($data);

            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            abort(500);
        }
    }

    public function update($request, $user)
    {
        try{
            DB::beginTransaction();
            $user->name = $request->input('name');
            $user->email = $request->input('email');

            if ($request->filled('password')) {
                $user->password = Hash::make($request->input('password'));
            }

            $user->save();
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            abort(500);
        }
    }
}
