<div>
    {{-- wire:model.live actualiza $search en tiempo real --}}
    {{-- debounce.300ms espera 300ms para no hacer request por cada tecla --}}
    <input
        type="text"
        wire:model.live.debounce.300ms="search"
        placeholder="Search by title, author or ISBN..."
    />

    {{-- Se muestra solo mientras Livewire esta procesando --}}
    <span wire:loading>Searching...</span>

    @if(strlen($search) >= 2)
        @if($books->isEmpty())
            <p>No books found for "{{ $search }}"</p>
        @else
            <p>{{ $books->count() }} book(s) found</p>
            <table>
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>ISBN</th>
                    <th>Genre</th>
                    <th>Year</th>
                    <th>Copies</th>
                </tr>
                </thead>
                <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->isbn }}</td>
                        <td>{{ $book->genre ?? '—' }}</td>
                        <td>{{ $book->published_year ?? '—' }}</td>
                        <td>{{ $book->copies }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    @endif
</div>
