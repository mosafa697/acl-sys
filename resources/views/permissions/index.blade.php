@extends('layouts.app')

@section('content')
    <h1>Permissions</h1>
    <a href="{{ route('permissions.create') }}">Create New Permission</a>
    <a href="{{ route('groups.index') }}">Edit Groups</a>
    <ul>
        @foreach ($permissions as $permission)
            <li>
                {{ $permission->name }}
                <a href="{{ route('permissions.edit', $permission) }}">Edit</a>
                <form action="{{ route('permissions.destroy', $permission) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
