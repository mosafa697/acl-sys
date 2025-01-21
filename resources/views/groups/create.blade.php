<h1>Create New Group</h1>
<form action="{{ route('groups.store') }}" method="POST">
    @csrf
    <label for="name">Group Name:</label>
    <input type="text" name="name" id="name" required>
    <button type="submit">Create</button>
</form>
