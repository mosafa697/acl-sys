@extends('layouts.app')

@section('content')
    @can('update', 'UserPermission')
        <h1>Assign Permissions to {{ $user->name }}</h1>
        <form id="assign-permissions-to-user-form" action="{{ route('user-permissions.update', $user) }}" method="post">
            @csrf
            @method('PUT')
            <div>
                <span>Permissions:</span>
                @foreach ($permissions as $permission)
                    <div>
                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                            {{ $user->permissions->contains($permission) ? 'checked' : '' }}>
                        <label>{{ $permission->name }}</label>
                    </div>
                @endforeach
            </div>
            <button type="submit">Update Permissions</button>
        </form>
        <script>
            document.getElementById('assign-permissions-to-user-form').addEventListener(
                'submit',
                function(event) {
                    event.preventDefault();
                    const formData = new FormData(this);
                    /* 
                     * NOTE: using Fetch is more aligned than Ajax with modern JavaScript practices, 
                     * provides better readability, and reduces dependencies on external libraries.
                     */
                    fetch(this.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json',
                            },
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (!data.success) alert('Failed to update permissions.');
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('An error occurred while updating permissions.');
                        });
                });
        </script>
    @endcan
@endsection
