<h1>Assign Permissions to {{ $group->name }}</h1>
<form action="{{ route('groups.assign-permissions', $group) }}" method="POST">
    @csrf
    @foreach ($permissions as $permission)
        <label>
            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">
            {{ $permission->name }} ({{ $permission->slug }})
        </label><br>
    @endforeach
    <button type="submit">Assign Permissions</button>
</form>
