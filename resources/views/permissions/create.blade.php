<h1>Create New Permission</h1>
<form action="{{ route('permissions.store') }}" method="POST">
    @csrf
    <label for="name">Permission: </label>
    <input type="text" name="name" id="name" required>
    <button type="submit">Create</button>
</form>
