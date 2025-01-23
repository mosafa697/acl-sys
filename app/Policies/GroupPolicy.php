<?php

namespace App\Policies;

use App\Models\User;

class GroupPolicy
{
    public function index(User $user): bool
    {
        return $user->permissions->contains('name', 'index-group');
    }

    public function create(User $user): bool
    {
        return $user->permissions->contains('name', 'store-group');
    }

    public function update(User $user): bool
    {
        return $user->permissions->contains('name', 'update-group');
    }

    public function delete(User $user): bool
    {
        return $user->permissions->contains('name', 'destroy-group');
    }
}
