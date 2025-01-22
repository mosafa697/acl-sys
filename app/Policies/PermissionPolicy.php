<?php

namespace App\Policies;

use App\Models\User;

class PermissionPolicy
{
    public function view(User $user): bool
    {
        return $user->permissions->contains('name', 'index-permission');
    }

    public function create(User $user): bool
    {
        return $user->permissions->contains('name', 'store-permission');
    }

    public function update(User $user): bool
    {
        return $user->permissions->contains('name', 'update-permission');
    }

    public function delete(User $user): bool
    {
        return $user->permissions->contains('name', 'destroy-permission');
    }
}
