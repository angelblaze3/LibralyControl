<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Library Control' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100 min-h-screen">

{{-- Navbar --}}
<nav class="bg-white shadow-sm border-b border-gray-200">
    <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between">
        {{-- Logo --}}
        <span class="text-xl font-semibold text-indigo-600">
                📚 Library Control
            </span>

        {{-- Usuario y logout --}}
        <div class="flex items-center gap-4">
                <span class="text-sm text-gray-600">
                    {{ auth()->user()->name }}
                </span>
            <form action="{{ route('user.logout') }}" method="POST">
                @csrf
                <button type="submit"
                        class="text-sm text-red-500 hover:text-red-700 transition">
                    Logout
                </button>
            </form>
        </div>
    </div>
</nav>

{{-- Contenido principal --}}
<main class="max-w-6xl mx-auto px-4 py-8">
    {{ $slot }}
</main>

@livewireScripts
</body>
</html>
