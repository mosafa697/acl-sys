@extends('layouts.app')

@section('content')
    <h1>Users</h1>
    @can('index', App\Models\User::class)
        @can('create', App\Models\User::class)
            <a href="{{ route('users.create') }}">Create New User</a>
        @endcan
        @can('index', App\Models\Permission::class)
            <a href="{{ route('permissions.index') }}">Edit Permissions</a>
        @endcan
        <ul>
            @foreach ($users as $user)
                <li>
                    {{ $user->name }}
                    @can('update', 'UserPermission')
                        <a href="{{ route('user-permissions.edit', $user) }}">Control Permissions</a>
                    @endcan
                    @can('index', App\Models\User::class)
                        <form action="{{ route('users.destroy', $user) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    @endcan
                </li>
            @endforeach
        </ul>
    @else
        <h2>You are not authorized to view the list of users.</h2>
    @endcan
@endsection
