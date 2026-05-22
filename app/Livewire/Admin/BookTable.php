<?php

namespace App\Livewire\Admin;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class BookTable extends Component
{
    // WithPagination es un trait de Livewire que maneja la paginacion
    // sin recargar la pagina
    use WithPagination;

    public string $search = '';

    // Cuando el buscador cambia reseteamos a la pagina 1
    // para no quedarnos en una pagina que ya no existe
    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public ?int $confirmingDelete = null;

    public function delete(int $id): void
    {
        $book = Book::findOrFail($id);
        $book->delete();
        $this->confirmingDelete = null;
        $this->dispatch('book-deleted');
    }

    public function cancelDelete(): void
    {
        $this->confirmingDelete = null;
    }

    public function render()
    {
        $books = Book::when($this->search, function ($query) {
            $query->where('title', 'like', '%' . $this->search . '%')
                ->orWhere('author', 'like', '%' . $this->search . '%')
                ->orWhere('isbn', 'like', '%' . $this->search . '%');
        })
            ->orderBy('title')
            ->paginate(10);

        return view('livewire.admin.book-table', compact('books'));
    }
}
