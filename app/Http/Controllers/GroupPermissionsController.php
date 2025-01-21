<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupPermissionsController extends Controller
{
    // Assign permissions to a group
    public function assignPermissions(Request $request, Group $group)
    {
        $group->permissions()->sync($request->get('permissions', []));

        return response()->json(['success' => true]);
    }
}
