<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    // You can add specific methods related to the User entity here if needed.
    // For example, if you have custom queries or logic for the User model.
}
