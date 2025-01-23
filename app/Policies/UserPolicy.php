<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function index(User $user): bool
    {
        return $user->permissions->contains('name', 'index-user');
    }

    public function create(User $user): bool
    {
        return $user->permissions->contains('name', 'store-user');
    }

    public function update(User $user): bool
    {
        return $user->permissions->contains('name', 'update-user');
    }

    public function delete(User $user): bool
    {
        return $user->permissions->contains('name', 'destroy-user');
    }
}
