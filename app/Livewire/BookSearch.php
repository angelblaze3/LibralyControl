<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;

class BookSearch extends Component
{
    // wire:model en la vista sincroniza este valor con el input de busqueda
    // Cada vez que el usuario escribe, $search se actualiza automaticamente
    public string $search = '';

    public function render()
    {
        // Solo buscamos si hay al menos 2 caracteres
        $books = collect();

        if (strlen($this->search) >= 2) {
            $books = Book::where('title', 'like', '%' . $this->search . '%')
                ->orWhere('author', 'like', '%' . $this->search . '%')
                ->orWhere('isbn', 'like', '%' . $this->search . '%')
                ->get();
        }

        return view('livewire.book-search', compact('books'));
    }
}
