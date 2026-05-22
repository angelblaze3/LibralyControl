<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    @livewireStyles
</head>
<body>
<h1>Add New Book</h1>
<a href="{{ route('admin.dashboard') }}">← Back</a>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('admin.books.store') }}" method="POST">
    @csrf

    <label>Title</label>
    <input type="text" name="title" value="{{ old('title') }}" required>

    <label>Author</label>
    <input type="text" name="author" value="{{ old('author') }}" required>

    <label>ISBN</label>
    <input type="text" name="isbn" value="{{ old('isbn') }}" required>

    <label>Genre</label>
    <input type="text" name="genre" value="{{ old('genre') }}">

    <label>Published Year</label>
    <input type="number" name="published_year" value="{{ old('published_year') }}">

    <label>Copies</label>
    <input type="number" name="copies" value="{{ old('copies', 1) }}" required>

    <button type="submit">Save Book</button>
</form>

@livewireScripts
</body>
</html>
