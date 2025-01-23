<?php

namespace App\Http\Controllers;

use App\Models\Control;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    public function index()
    {
        $this->authorize('index', Permission::class);

        $permissions = Permission::all();
        return view('permissions.index', compact('permissions'));
    }

    public function create()
    {
        $this->authorize('create', Permission::class);

        $controls = Control::with('methods')->get();

        return view('permissions.create', compact('controls'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', Permission::class);

        $request->merge([
            'slug' => Str::slug($request->name)
        ])->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:permissions,slug',
            'method_id' => 'required|exists:methods,id',
        ]);

        Permission::create($request->all());

        return redirect()->route('permissions.index')->with('success', 'Permission created successfully.');
    }

    public function edit(Permission $permission)
    {
        $this->authorize('update', Permission::class);

        $controls = Control::with('methods')->get();

        return view('permissions.edit', compact('permission', 'controls'));
    }

    public function update(Request $request, Permission $permission)
    {
        $this->authorize('update', Permission::class);

        $request->merge([
            'slug' => Str::slug($request->name)
        ])->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:permissions,slug,' . $permission->id,
            'method_id' => 'required|exists:methods,id',
        ]);

        $permission->update($request->all());

        return redirect()->route('permissions.index')->with('success', 'Permission updated successfully.');
    }

    public function destroy(Permission $permission)
    {
        $this->authorize('delete', Permission::class);

        $permission->delete();

        return redirect()->route('permissions.index')->with('success', 'Permission deleted successfully.');
    }
}
