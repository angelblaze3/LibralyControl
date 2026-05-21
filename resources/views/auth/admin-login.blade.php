<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library — Admin Login</title>
</head>
<body>
<h1>Admin Login</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('admin.login.submit') }}" method="POST">
    @csrf
    <label>Email</label>
    <input type="email" name="email" value="{{ old('email') }}" required>

    <label>Password</label>
    <input type="password" name="password" required>

    <button type="submit">Login</button>
</form>

<p>Are you a user? <a href="{{ route('user.login') }}">User Login</a></p>
</body>
</html>
