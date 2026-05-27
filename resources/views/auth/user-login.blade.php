<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library — Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="bg-white w-full max-w-md rounded-xl shadow-md p-8">
    {{-- Logo --}}
    <div class="text-center mb-6">
        <span class="text-4xl">📚</span>
        <h1 class="text-2xl font-bold text-gray-800 mt-2">Library Control</h1>
        <p class="text-gray-500 text-sm mt-1">Sign in to your account</p>
    </div>

    {{-- Errores --}}
    @if($errors->any())
        <div class="mb-4 bg-red-100 border border-red-300 text-red-600 px-4 py-3 rounded text-sm">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('user.login.submit') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email') }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400"
                   required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input type="password" name="password"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400"
                   required>
        </div>

        <button type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 rounded-lg transition text-sm">
            Sign In
        </button>
    </form>

    <p class="text-center text-sm text-gray-500 mt-4">
        Admin?
        <a href="{{ route('admin.login') }}" class="text-indigo-600 hover:underline">
            Admin Login
        </a>
    </p>
</div>

</body>
</html>
