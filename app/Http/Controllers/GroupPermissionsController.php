<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupPermissionsController extends Controller
{
    // Assign permissions to a group
    public function assignPermissions(Request $request, Group $group)
    {
        $request->validate([
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        $group->permissions()->sync($request->permissions);

        $groups = Group::with('permissions')->get();

        return redirect()->route('groups.index', $groups)->with('success', 'Permissions assigned successfully.');
    }

    // Revoke permissions from a group
    public function removePermissions(Request $request, Group $group)
    {
        $request->validate([
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        $group->permissions()->detach($request->permissions);

        $groups = Group::with('permissions')->get();

        return redirect()->route('groups.index', $groups)->with('success', 'Permissions removed successfully.');
    }
}
