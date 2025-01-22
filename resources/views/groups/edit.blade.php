@extends('layouts.app')

@section('content')
    <h1>Edit Group</h1>
    <form action="{{ route('groups.update', $group) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Group Name:</label>
        <input type="text" name="name" id="name" value="{{ $group->name }}" required>
        <button type="submit">Update</button>
    </form>
@endsection