<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;

class UserPermissionController extends Controller
{
    public function edit(User $user)
    {
        $this->authorize('update', 'UserPermission');

        $user->load('permissions');
        $permissions = Permission::all();

        return view('user-permissions.edit', compact('user', 'permissions'));
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('update', 'UserPermission');

        $request->validate([
            'permissions.*' => 'exists:permissions,id',
        ]);

        $user->permissions()->sync($request->get('permissions', []));

        return response()->json(['success' => true]);
    }
}
