@extends('layouts.app')

@section('content')
    <h1>Create New Group</h1>
    @can('create', App\Models\Group::class)
        <form action="{{ route('groups.store') }}" method="POST">
            @csrf
            <label for="name">Group Name:</label>
            <input type="text" name="name" id="name" required>
            <button type="submit">Create</button>
        </form>
    @else
        <p>You do not have permission to create a group.</p>
    @endcan
@endsection
