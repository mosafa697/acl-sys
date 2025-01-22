<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupPermissionsController extends Controller
{
    public function assignPermissions(Request $request, Group $group)
    {
        $request->validate([
            'permissions.*' => 'exists:permissions,id',
        ]);

        $group->permissions()->sync($request->get('permissions', []));

        return response()->json(['success' => true]);
    }
}
