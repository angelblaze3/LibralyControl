<!DOCTYPE html>
<html lang="en">
<head><title>Admin Dashboard</title></head>
<body>
<h1>Welcome Admin, {{ auth()->user()->name }}</h1>
<form action="{{ route('admin.logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>
</body>
</html>
