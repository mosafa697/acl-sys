@extends('layouts.app')

@section('content')
    @can('index', App\Models\Group::class)
        <h1>Groups</h1>
        @can('create', App\Models\Group::class)
            <a href="{{ route('groups.create') }}">Create New Group</a>
        @endcan
        @can('index', App\Models\Permission::class)
            <a href="{{ route('permissions.index') }}">Edit Permissions</a>
        @endcan
        <ul>
            @foreach ($groups as $group)
                <li>
                    {{ $group->name }}
                    @can('update', App\Models\Group::class)
                        <a href="{{ route('groups.edit', $group) }}">Edit</a>
                    @endcan
                    @can('assign', 'GroupPermission')
                        <div>
                            <form class="assign-permissions-form" id="assign-permissions-form-{{ $group->id }}"
                                action="{{ route('groups.assign-permissions', $group) }}" method="post">
                                @csrf
                                <span>Permissions list:</span>
                                @foreach ($permissions as $permission)
                                    <div>
                                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                            {{ $group->permissions->contains($permission) ? 'checked' : '' }}>
                                        <label>
                                            {{ $permission->name }} -
                                            {{ $permission->method?->name }} -
                                            {{ $permission->method?->control?->name }}
                                        </label>
                                    </div>
                                @endforeach
                                <button type="submit">Update Permissions</button>
                            </form>
                        </div>
                    @endcan
                    @can('delete', App\Models\Group::class)
                        <form action="{{ route('groups.destroy', $group) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    @endcan
                </li>

                {{-- placed here to handle group id --}}
                <script>
                    document.getElementById('assign-permissions-form-' + {{ $group->id }}).addEventListener(
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
            @endforeach
        </ul>
    @else
        <p>You do not have permission to view groups.</p>
    @endcan
@endsection
