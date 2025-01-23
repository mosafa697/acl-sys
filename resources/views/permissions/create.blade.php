@extends('layouts.app')

@section('content')
    <h1>Create New Permission</h1>
    @can('create', App\Models\Permission::class)
        <form action="{{ route('permissions.store') }}" method="POST">
            @csrf
            <label for="name">Permission: </label>
            <input type="text" name="name" id="name" required>

            <label for="method_id">Method: </label>
            <select name="method_id" id="method_id" required>
                @foreach ($controls as $control)
                    @foreach ($control->methods as $method)
                        <option value="{{ $method->id }}">{{ $control->name }} - {{ $method->name }}</option>
                    @endforeach
                @endforeach
            </select>
            <button type="submit">Create</button>
        </form>
    @else
        <p>You do not have permission to create a permission.</p>
    @endcan
@endsection
