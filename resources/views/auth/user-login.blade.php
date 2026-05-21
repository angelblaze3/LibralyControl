<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library — User Login</title>
</head>
<body>
<h1>User Login</h1>

{{-- @if session tiene 'errors', los mostramos --}}
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

{{-- action apunta a la ruta que procesa el login --}}
<form action="{{ route('user.login.submit') }}" method="POST">
    {{-- @csrf genera el token de seguridad para prevenir ataques CSRF --}}
    @csrf

    <label>Email</label>
    {{-- old('email') recupera el valor que escribio si hubo error --}}
    <input type="email" name="email" value="{{ old('email') }}" required>

    <label>Password</label>
    <input type="password" name="password" required>

    <button type="submit">Login</button>
</form>

<p>Are you an admin? <a href="{{ route('admin.login') }}">Admin Login</a></p>
</body>
</html>
