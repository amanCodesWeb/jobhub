<div>
    <ul class="flex items-center gap-6 text-sm">
        <li>
            <x-header.nav-link href="/" :active="request()->is('/')">Home</x-header.nav-link>
        </li>

        <li>
            <x-header.nav-link href="/about" :active="request()->is('about')">About</x-header.nav-link>
        </li>

        <li>
            <x-header.nav-link href="/contact" :active="request()->is('contact')" >Contact</x-header.nav-link>
        </li>
    </ul>
    </nav>
</div>