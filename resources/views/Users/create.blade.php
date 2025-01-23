@extends('layouts.app')

@section('content')
    <h1>Create New User</h1>
    @can('create', App\Models\User::class)
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <label for="name">Name: </label>
            <input type="text" name="name" id="name" required><br>

            <label for="email">Email: </label>
            <input type="email" name="email" id="email" required><br>

            <label for="password">Password: </label>
            <input type="password" name="password" id="password" required><br>

            <button type="submit">Create</button>
        </form>
    @else
        <h2>You are not authorized to create a new user.</h2>
    @endcan
@endsection
