<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>laravel12</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    {{-- header --}}
    <x-header></x-header>

    {{-- heading --}}
    <div class="bg-white shadow">
        <div class="mx-auto mx-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $heading }}</h1>
        </div>
    </div>

    <main>
        <div class="mx-auto mx-w-7xl px-4 py-6 sm:py-6 lg:px-8">
            {{$slot}}
        </div>
    </main>
</body>
</html>