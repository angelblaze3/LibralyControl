<!DOCTYPE html>
<html lang="en">
<head><title>User Dashboard</title></head>
<body>
<h1>Welcome, {{ auth()->user()->name }}</h1>
<form action="{{ route('user.logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>
</body>
</html>
