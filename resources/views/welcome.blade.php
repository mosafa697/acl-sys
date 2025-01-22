<!DOCTYPE html>

<body>
    <div class="container mt-5">
        <h1>Welcome</h1>
        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="{{ route('permissions.index') }}" class="btn btn-primary">Permissions</a>
            <a href="{{ route('groups.index') }}" class="btn btn-secondary">Groups</a>
            <a href="{{ route('users.index') }}" class="btn btn-success">Users</a>
        </div>
    </div>
</body>

</html>
