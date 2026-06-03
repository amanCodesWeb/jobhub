
@props(['active' => false])

<a class="text-sm font-medium {{ $active ? 'text-teal-600 dark:text-teal-400' : 'text-gray-600 hover:text-teal-600 dark:text-gray-400 dark:hover:text-teal-400' }} transition" {{ $attributes }}>
    {{ $slot }}
</a>