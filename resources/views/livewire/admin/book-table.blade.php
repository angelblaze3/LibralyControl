<div>
    {{-- Mensaje de libro eliminado --}}
    <div x-data="{ show: false }"
         x-on:book-deleted.window="show = true; setTimeout(() => show = false, 3000)"
         x-show="show"
         class="mb-4 bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded">
        Book deleted successfully.
    </div>

    {{-- Header con buscador y boton --}}
    <div class="flex flex-col sm:flex-row gap-3 mb-4">
        <input
            type="text"
            wire:model.live.debounce.300ms="search"
            placeholder="Search books..."
            class="flex-1 border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400"
        />
        <a href="{{ route('admin.books.create') }}"
           class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-4 py-2 rounded-lg transition text-center">
            + Add New Book
        </a>
    </div>

    {{-- Tabla --}}
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
                <th class="text-left px-4 py-3 font-medium text-gray-600">Actions</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
            @forelse($books as $book)
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
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-2">
                            <a href="{{ route('admin.books.edit', $book) }}"
                               class="text-indigo-600 hover:text-indigo-800 font-medium transition">
                                Edit
                            </a>

                            @if($confirmingDelete === $book->id)
                                <span class="text-gray-500 text-xs">Sure?</span>
                                <button wire:click="delete({{ $book->id }})"
                                        class="text-red-600 hover:text-red-800 font-medium transition">
                                    Yes
                                </button>
                                <button wire:click="cancelDelete"
                                        class="text-gray-500 hover:text-gray-700 transition">
                                    No
                                </button>
                            @else
                                <button wire:click="$set('confirmingDelete', {{ $book->id }})"
                                        class="text-red-500 hover:text-red-700 font-medium transition">
                                    Delete
                                </button>
                            @endif
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="px-4 py-12 text-center text-gray-400">
                        <p class="text-3xl mb-2">📭</p>
                        <p>No books found.</p>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    {{-- Paginacion --}}
    <div class="mt-4">
        {{ $books->links() }}
    </div>
</div>
