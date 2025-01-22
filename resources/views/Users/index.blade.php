<h1>Users</h1>
<a href="{{ route('users.create') }}">Create New User</a>
<a href="{{ route('permissions.index') }}">Edit Permissions</a>
<ul>
    @foreach ($users as $user)
        <li>
            {{ $user->name }}
            <a href="{{ route('user-permissions.edit', $user) }}">Control Permissions</a>
            <form action="{{ route('users.destroy', $user) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
