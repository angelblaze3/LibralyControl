<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Muestra la lista de todos los libros
    // Aqui usaremos un componente Livewire en lugar de logica directa
    public function index()
    {
        return view('admin.books.index');
    }

    // Muestra el formulario para crear un libro nuevo
    public function create()
    {
        return view('admin.books.create');
    }

    // Guarda un libro nuevo en la base de datos
    public function store(Request $request)
    {
        // Validamos todos los campos antes de guardar
        $validated = $request->validate([
            'title'          => ['required', 'string', 'max:255'],
            'author'         => ['required', 'string', 'max:255'],
            'isbn'           => ['required', 'string', 'unique:books,isbn'],
            'genre'          => ['nullable', 'string', 'max:100'],
            'published_year' => ['nullable', 'integer', 'min:1000', 'max:2099'],
            'copies'         => ['required', 'integer', 'min:1'],
        ]);

        // Mass assignment — crea el registro con todos los campos validados
        Book::create($validated);

        // Redirigimos al index con un mensaje de exito
        return redirect()->route('admin.dashboard')
            ->with('success', 'Book created successfully.');
    }

    // Muestra el formulario para editar un libro existente
    // Route model binding — Laravel busca el Book por ID automaticamente
    public function edit(Book $book)
    {
        return view('admin.books.edit', compact('book'));
    }

    // Actualiza un libro existente en la base de datos
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title'          => ['required', 'string', 'max:255'],
            'author'         => ['required', 'string', 'max:255'],
            // unique ignora el ISBN del libro actual para no chocar consigo mismo
            'isbn'           => ['required', 'string', 'unique:books,isbn,' . $book->id],
            'genre'          => ['nullable', 'string', 'max:100'],
            'published_year' => ['nullable', 'integer', 'min:1000', 'max:2099'],
            'copies'         => ['required', 'integer', 'min:1'],
        ]);

        $book->update($validated);

        return redirect()->route('admin.dashboard')
            ->with('success', 'Book updated successfully.');
    }

    // Elimina un libro de la base de datos
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('admin.dashboard')
            ->with('success', 'Book deleted successfully.');
    }
}
