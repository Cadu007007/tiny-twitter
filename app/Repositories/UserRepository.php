<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{

    /**
     * @param $data
     *
     *
     * @return \App\Models\User
     */
    public function create(array $data): User
    {
        return User::create($data);
    }
}
