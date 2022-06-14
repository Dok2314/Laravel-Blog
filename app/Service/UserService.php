<?php

namespace App\Service;

use App\Mail\User\PasswordMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class UserService
{
    public function store($request)
    {
        try{
            DB::beginTransaction();
            $password = Str::random(10);

            $data = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($password),
                'role' => $request->input('role_id')
            ];

            $user = User::firstOrCreate($data);

            Mail::to($data['email'])->send(new PasswordMail($password));

            event(new Registered($user));

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
            $user->role = $request->input('role_id');

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
