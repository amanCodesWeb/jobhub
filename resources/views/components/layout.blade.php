<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>laravel12</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col bg-white dark:bg-gray-950 text-gray-900 dark:text-gray-100">
    {{-- header --}}
    <x-header></x-header>

    {{-- heading --}}
    @if (trim((string) $heading))
    <div class="bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-800 shadow-sm">
        <div class="mx-auto mx-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <div class="flex items-center gap-4">
                @if ($backUrl ?? false)
                    <a href="{{ $backUrl }}" class="flex items-center justify-center w-10 h-10 rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700 hover:text-gray-700 dark:hover:text-gray-200 hover:border-gray-300 dark:hover:border-gray-600 transition shrink-0">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                        </svg>
                    </a>
                @endif
                <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $heading }}</h1>
            </div>
        </div>
    </div>
    @endif

    <main class="flex-1">
        <div class="mx-auto mx-w-7xl px-4 py-8 sm:py-10 lg:px-8 pb-12 sm:pb-16">
            {{$slot}}
        </div>
    </main>

    <x-footer></x-footer>
</body>
</html>