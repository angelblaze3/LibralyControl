<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library — Search Books</title>
    {{-- Livewire necesita sus estilos en el head --}}
    @livewireStyles
</head>
<body>
<h1>Library — Book Search</h1>
<p>Welcome, {{ auth()->user()->name }}</p>

{{-- Aqui incluimos el componente Livewire de busqueda --}}
@livewire('book-search')

<form action="{{ route('user.logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>

{{-- Livewire necesita sus scripts antes de cerrar el body --}}
@livewireScripts
</body>
</html>
