<?php


namespace App\Http\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminUserServices
{
    public function create($request)
    {
        $data = $request->all();

        $hashPassword = Hash::make($data['password']);

        $insertData = [
            'first_name' => $data['first_name'],
            'name' => $data['last_name'],
            'password' => $hashPassword,
            'email' => $data['email'],
            'role_id' => 1,
        ];

        User::query()->create($insertData);

        return true;
    }

    public function validation($request)
    {
        $data = $request->all();

        $user = User::query()->where("email", $data['email'])->first();

        if(!Hash::check($data['password'], $user->password))
        {
            return false;
        }

        return true;
    }
}
