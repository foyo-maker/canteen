<h2>Edit User</h2>

<form method="POST" action="/user/update">
    @csrf
    @method('PUT')
    <input type="hidden" id="id" name="id" value="{{  $user->id}}">
    <label for="name">Name:</label>
    <input type="text" name="name"  required>
    <label for="email">Email:</label>
    <input type="email" name="email"  required>
    <button type="submit">Update</button>
</form>