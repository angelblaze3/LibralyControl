<div>
    {{-- Alpine.js escucha el evento book-deleted que dispara el componente PHP --}}
    {{-- y muestra el mensaje por 3 segundos --}}
    <div x-data="{ show: false }"
         x-on:book-deleted.window="show = true; setTimeout(() => show = false, 3000)"
         x-show="show">
        Book deleted successfully.
    </div>

    <input
        type="text"
        wire:model.live.debounce.300ms="search"
        placeholder="Search books..."
    />

    <a href="{{ route('admin.books.create') }}">+ Add New Book</a>

    <table>
        <thead>
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>ISBN</th>
            <th>Genre</th>
            <th>Year</th>
            <th>Copies</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->isbn }}</td>
                <td>{{ $book->genre ?? '—' }}</td>
                <td>{{ $book->published_year ?? '—' }}</td>
                <td>{{ $book->copies }}</td>
                <td>
                    <a href="{{ route('admin.books.edit', $book) }}">Edit</a>

                    @if($confirmingDelete === $book->id)
                        <span>Are you sure?</span>
                        {{-- wire:click llama al metodo delete() en la clase PHP --}}
                        <button wire:click="delete({{ $book->id }})">Yes, delete</button>
                        <button wire:click="cancelDelete">Cancel</button>
                    @else
                        {{-- $set es un helper de Livewire para cambiar una propiedad --}}
                        {{-- directamente desde la vista sin necesitar un metodo --}}
                        <button wire:click="$set('confirmingDelete', {{ $book->id }})">
                            Delete
                        </button>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7">No books found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    {{-- WithPagination genera estos links automaticamente --}}
    {{ $books->links() }}
</div>
