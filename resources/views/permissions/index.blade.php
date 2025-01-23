@extends('layouts.app')

@section('content')
    <h1>Permissions</h1>
    @can('index', App\Models\Permission::class)
        @can('create', App\Models\Permission::class)
            <a href="{{ route('permissions.create') }}">Create New Permission</a>
        @endcan
        @can('index', App\Models\Group::class)
            <a href="{{ route('groups.index') }}">Edit Groups</a>
        @endcan
        <ul>
            @foreach ($permissions as $permission)
                <li>
                    {{ $permission->name }}
                    @can('update', App\Models\Permission::class)
                        <a href="{{ route('permissions.edit', $permission) }}">Edit</a>
                    @endcan
                    @can('delete', App\Models\Permission::class)
                        <form action="{{ route('permissions.destroy', $permission) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    @endcan
                </li>
            @endforeach
        </ul>
    @else
        <p>You do not have permission to view this page.</p>
    @endcan
@endsection
