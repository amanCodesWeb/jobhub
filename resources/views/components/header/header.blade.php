<header class="bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-800">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="relative flex items-center h-16 gap-3 sm:gap-4">

      {{-- Left: Logo --}}
      <div class="flex-shrink-0">
        <x-header.header-logo />
      </div>

      {{-- Center: Search bar (truly centered using absolute positioning) --}}
      <div class="absolute left-1/2" style="transform: translateX(-50%);">
        <form method="GET" action="/" class="relative w-36 sm:w-48 lg:w-56">
          <input type="text" name="search" value="{{ request('search') }}"
            placeholder="Search listings..."
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 pl-8 pr-7 py-2 text-sm text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 focus:outline-none transition" />
          <svg class="absolute left-2 top-2.5 w-4 h-4 text-gray-400 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
          </svg>
          @if (request('search'))
            <a href="/" class="absolute right-1.5 top-2.5 w-4 h-4 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition">
              <svg fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </a>
          @endif
        </form>
      </div>

      {{-- Right: Nav links + Theme toggle + Auth --}}
      <div class="flex-shrink-0 flex items-center gap-2 sm:gap-4 ml-auto">
        <x-header.navbar />

        <button id="theme-toggle" type="button" aria-label="Toggle theme"
          class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-gray-200 transition">
          <svg class="hidden dark:block w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
          </svg>
          <svg class="block dark:hidden w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
          </svg>
        </button>

        <x-header.login-register></x-header.login-register>
      </div>

    </div>
  </div>
</header>
