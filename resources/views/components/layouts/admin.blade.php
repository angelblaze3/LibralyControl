<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Library Control — Admin' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100 min-h-screen">

{{-- Navbar admin --}}
<nav class="bg-indigo-700 shadow-sm">
    <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between">
            <span class="text-xl font-semibold text-white">
                📚 Library Control — Admin
            </span>

        <div class="flex items-center gap-4">
                <span class="text-sm text-indigo-200">
                    {{ auth()->user()->name }}
                </span>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit"
                        class="text-sm text-white hover:text-indigo-200 transition">
                    Logout
                </button>
            </form>
        </div>
    </div>
</nav>

<main class="max-w-6xl mx-auto px-4 py-8">
    {{-- Mensaje de exito global --}}
    @if(session('success'))
        <div class="mb-4 bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{ $slot }}
</main>

@livewireScripts
</body>
</html>
