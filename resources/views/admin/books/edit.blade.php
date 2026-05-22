<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    @livewireStyles
</head>
<body>
<h1>Edit Book</h1>
<a href="{{ route('admin.dashboard') }}">← Back</a>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('admin.books.update', $book) }}" method="POST">
    @csrf
    {{-- HTML solo soporta GET y POST, @method('PUT') le dice a Laravel --}}
    {{-- que trate este POST como PUT para que coincida con la ruta --}}
    @method('PUT')

    <label>Title</label>
    <input type="text" name="title" value="{{ old('title', $book->title) }}" required>

    <label>Author</label>
    <input type="text" name="author" value="{{ old('author', $book->author) }}" required>

    <label>ISBN</label>
    <input type="text" name="isbn" value="{{ old('isbn', $book->isbn) }}" required>

    <label>Genre</label>
    <input type="text" name="genre" value="{{ old('genre', $book->genre) }}">

    <label>Published Year</label>
    <input type="number" name="published_year" value="{{ old('published_year', $book->published_year) }}">

    <label>Copies</label>
    <input type="number" name="copies" value="{{ old('copies', $book->copies) }}" required>

    <button type="submit">Update Book</button>
</form>

@livewireScripts
</body>
</html>
