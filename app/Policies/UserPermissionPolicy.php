<?php

namespace App\Policies;

use App\Models\User;

class UserPermissionPolicy
{
    public function update(User $user): bool
    {
        return $user->permissions->contains('name', 'update-user-permission');
    }
}
