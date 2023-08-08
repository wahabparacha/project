<?php

namespace App\Repositories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserRepository extends BaseRepository
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }
    public function save(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'phone' => 'required',

        ]);

        $username = $request->username;
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $phone = $request->phone;

        $user = new User();
        $user->username = $username;
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->phone = $phone;
        $user->save();

    }


}
