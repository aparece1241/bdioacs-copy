<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{

    /**
     * Create new user
     *
     * @param array $data user information
     *
     * @return \App\Models\User
     */
    public function create(array $data): User
    {

        return User::create($this->validateField($data));
    }

    public function update(array $data, User $user): User
    {
        $user->update($this->validateField($data));

        return $user;
    }

    public function updatePassword(array $data, User $user)
    {
        return $user->update([
            'password' => Hash::make($data['new_password'])
        ]);
    }

    private function validateField(array $data)
    {
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        return $data;
    }
}
