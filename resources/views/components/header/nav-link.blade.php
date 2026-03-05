
@props(['active' => false])

<div class="{{ $active ? 'border-b border-white' : '' }}">
    <a class="inline-block bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium hover:bg-gray-700" {{ $attributes }}>
        {{ $slot }}
    </a>
</div>