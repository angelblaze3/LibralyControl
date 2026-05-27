<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class BookSearch extends Component
{
    use WithPagination;

    public string $search = '';

    // Reseteamos la pagina cuando cambia el buscador
    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function render()
    {
        // Ahora siempre mostramos libros
        // when() aplica el filtro solo si $search tiene valor
        $books = Book::when($this->search, function ($query) {
            $query->where('title', 'like', '%' . $this->search . '%')
                ->orWhere('author', 'like', '%' . $this->search . '%')
                ->orWhere('isbn', 'like', '%' . $this->search . '%');
        })
            ->orderBy('title')
            ->paginate(10);

        return view('livewire.book-search', compact('books'));
    }
}
