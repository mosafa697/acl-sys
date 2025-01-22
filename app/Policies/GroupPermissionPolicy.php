<?php

namespace App\Policies;

use App\Models\User;

class GroupPermissionPolicy
{
    public function assign(User $user): bool
    {
        return $user->permissions->contains('name', 'assign-group-permission');
    }
}
