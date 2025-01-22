<?php

namespace App\Policies;

use App\Models\User;

class UserPermissionPolicy
{
    public function edit(User $user): bool
    {
        return $user->permissions->contains('name', 'edit-user-permission');
    }

    public function forceDelete(User $user): bool
    {
        return $user->permissions->contains('name', 'update-user-permission');
    }
}
