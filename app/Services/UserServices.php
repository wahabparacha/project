<?php

//app/Services/UserService.php

namespace App\Services;

use App\Models\User;

class UserServices
{
    public function getAllUsers()
    {
        return User::get();
    }

    public function add(array $userData)
    {
        return User::create($userData);

    }

    public function getUserById($id)
    {
        return User::findOrFail($id);
    }

    public function update($id, array $userData)
    {
        return User::where('id', $id)->update($userData);
    }

    public function deleteUser($id)
    {
        return User::where('id', $id)->delete();
    }
}
