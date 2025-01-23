@extends('layouts.app')

@section('content')
    <h1>Edit Permission</h1>
    @can('update', App\Models\Permission::class)
        <form action="{{ route('permissions.update', $permission) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="name">Permission Name:</label>
            <input type="text" name="name" id="name" value="{{ $permission->name }}" required>

            <label for="method_id">Method:</label>
            <select name="method_id" id="method_id" required>
                @foreach ($methods as $method)
                    <option value="{{ $method->id }}" {{ $method->id == $permission->method_id ? 'selected' : '' }}>
                        {{ $method->name }}
                    </option>
                @endforeach
            </select>
            <button type="submit">Update</button>
        </form>
    @else
        <p>You do not have permission to edit this permission.</p>
    @endcan
@endsection
