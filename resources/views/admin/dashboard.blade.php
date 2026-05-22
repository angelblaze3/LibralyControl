<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library — Admin</title>
    @livewireStyles
</head>
<body>
<h1>Library Admin</h1>
<p>Welcome, {{ auth()->user()->name }}</p>

{{-- Mostramos el mensaje de exito si existe en la sesion --}}
@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

{{-- Incluimos el componente de tabla del admin --}}
@livewire('admin.book-table')

<form action="{{ route('admin.logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>

@livewireScripts
</body>
</html>
