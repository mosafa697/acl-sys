<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Permission;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::with('permissions')->get();

        $permissions = Permission::with([
            'method:id,name,control_id',
            'method.control:id,name'
        ])->get();

        return view('groups.index', compact('groups', 'permissions'));
    }

    public function create()
    {
        return view('groups.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Group::create($request->all());

        return redirect()->route('groups.index')->with('success', 'Group created successfully.');
    }

    public function edit(Group $group)
    {
        return view('groups.edit', compact('group'));
    }

    public function update(Request $request, Group $group)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $group->update($request->all());

        return redirect()->route('groups.index')->with('success', 'Group updated successfully.');
    }

    public function destroy(Group $group)
    {
        $group->delete();

        return redirect()->route('groups.index')->with('success', 'Group deleted successfully.');
    }
}
