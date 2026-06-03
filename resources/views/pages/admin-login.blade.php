<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | ListingHub</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-900 flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <div class="bg-gray-800 border border-gray-700 rounded-2xl shadow-xl p-8 sm:p-10">
            {{-- Header --}}
            <div class="text-center mb-8">
                <div class="mx-auto w-14 h-14 rounded-xl bg-teal-500/20 flex items-center justify-center mb-4">
                    <span class="text-2xl font-bold text-teal-400">L</span>
                </div>
                <h2 class="text-2xl font-bold tracking-tight text-white">Admin Login</h2>
                <p class="mt-2 text-sm text-gray-400">Sign in with your admin credentials</p>
            </div>

            {{-- Error messages --}}
            @if ($errors->any())
                <div class="mb-6 rounded-lg bg-red-900/30 border border-red-800 p-4">
                    <div class="flex gap-2">
                        <svg class="w-5 h-5 text-red-400 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                        </svg>
                        <div class="text-sm text-red-300">
                            {{ $errors->first('email') }}
                        </div>
                    </div>
                </div>
            @endif

            {{-- Session status --}}
            @if (session('status'))
                <div class="mb-6 rounded-lg bg-green-900/30 border border-green-800 p-4 text-sm text-green-300">
                    {{ session('status') }}
                </div>
            @endif

            {{-- Form --}}
            <form method="POST" action="/admin.php" class="space-y-5">
                @csrf

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-1.5">Email address</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        class="block w-full rounded-lg border border-gray-600 bg-gray-700 px-4 py-3 text-sm text-white placeholder-gray-400 shadow-xs focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 focus:outline-none transition"
                        placeholder="admin@example.com" required autofocus />
                </div>

                {{-- Password --}}
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-300 mb-1.5">Password</label>
                    <input type="password" name="password" id="password"
                        class="block w-full rounded-lg border border-gray-600 bg-gray-700 px-4 py-3 text-sm text-white placeholder-gray-400 shadow-xs focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 focus:outline-none transition"
                        placeholder="••••••••" required />
                </div>

                {{-- Submit --}}
                <button type="submit"
                    class="w-full rounded-lg bg-teal-600 px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 focus:ring-offset-gray-800 transition">
                    Sign in to Admin Panel
                </button>
            </form>

            {{-- Back to home --}}
            <p class="mt-8 text-center text-sm text-gray-400">
                <a href="/" class="font-medium text-teal-400 hover:text-teal-300 transition-colors">
                    &larr; Back to ListingHub
                </a>
            </p>
        </div>
    </div>
</body>
</html>
