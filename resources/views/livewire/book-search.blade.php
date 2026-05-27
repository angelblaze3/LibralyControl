<div>
    {{-- Input de busqueda --}}
    <div class="relative mb-6">
        <input
            type="text"
            wire:model.live.debounce.300ms="search"
            placeholder="Search by title, author or ISBN..."
            class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 pr-10"
        />
        <span wire:loading class="absolute right-3 top-3 text-gray-400 text-sm">
            ⏳
        </span>
    </div>

    {{-- Contador de resultados --}}
    <p class="text-sm text-gray-500 mb-3">
        {{ $books->total() }} book(s) found
        @if($search)
            for "{{ $search }}"
        @endif
    </p>

    @if($books->isEmpty())
        <div class="text-center py-12 text-gray-400">
            <p class="text-4xl mb-2">📭</p>
            <p>No books found for "{{ $search }}"</p>
        </div>
    @else
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="text-left px-4 py-3 font-medium text-gray-600">Title</th>
                    <th class="text-left px-4 py-3 font-medium text-gray-600">Author</th>
                    <th class="text-left px-4 py-3 font-medium text-gray-600">ISBN</th>
                    <th class="text-left px-4 py-3 font-medium text-gray-600">Genre</th>
                    <th class="text-left px-4 py-3 font-medium text-gray-600">Year</th>
                    <th class="text-left px-4 py-3 font-medium text-gray-600">Copies</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                @foreach($books as $book)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3 font-medium text-gray-800">{{ $book->title }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $book->author }}</td>
                        <td class="px-4 py-3 text-gray-500">{{ $book->isbn }}</td>
                        <td class="px-4 py-3 text-gray-500">{{ $book->genre ?? '—' }}</td>
                        <td class="px-4 py-3 text-gray-500">{{ $book->published_year ?? '—' }}</td>
                        <td class="px-4 py-3">
                                <span class="bg-indigo-100 text-indigo-700 px-2 py-1 rounded-full text-xs font-medium">
                                    {{ $book->copies }}
                                </span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        {{-- Paginacion --}}
        <div class="mt-4">
            {{ $books->links() }}
        </div>
    @endif
</div>
