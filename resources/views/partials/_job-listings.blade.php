@forelse ($jobs as $job)
    <a href="/jobs/{{ $job->id }}"
       class="block bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl p-6 shadow-sm hover:shadow-md hover:border-teal-300 dark:hover:border-teal-500 hover:-translate-y-0.5 transition-all duration-200">
        <div class="flex items-start justify-between gap-4">
            <div class="min-w-0 flex-1">
                <div class="flex items-center gap-2 flex-wrap">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white truncate">{{ $job->title }}</h2>
                    <span class="inline-flex items-center rounded-full bg-teal-50 dark:bg-teal-900/30 px-2.5 py-0.5 text-xs font-medium text-teal-700 dark:text-teal-300 border border-teal-200 dark:border-teal-700">
                        ${{ number_format($job->salary) }}/day
                    </span>
                </div>
                <div class="mt-2 flex items-center gap-4 text-sm text-gray-500 dark:text-gray-400">
                    {{-- <span class="flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-gray-400 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                        {{ $job->user->first_name }} {{ $job->user->last_name }}
                    </span> --}}
                    <span class="flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-gray-400 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        {{ $job->created_at->diffForHumans() }}
                    </span>
                    <span class="flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-gray-400 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-.75 3h1.5m-1.5 3h1.5m6-12h1.5m-1.5 3h1.5m-.75 3h1.5m-1.5 3h1.5" />
                        </svg>
                        {{ $job->company_name ?? ($job->user->first_name . ' ' . $job->user->last_name) }}
                    </span>
                    @if ($job->location)
                        <span class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-gray-400 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                            {{ $job->location }}
                        </span>
                    @endif
                </div>
                <p class="mt-3 text-sm text-gray-600 dark:text-gray-400 leading-relaxed line-clamp-2">
                    {{ Str::limit($job->description, 160) }}
                </p>
            </div>
            <svg class="w-5 h-5 text-gray-300 dark:text-gray-600 shrink-0 mt-1 group-hover:text-teal-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        </div>
    </a>
@empty
    <div class="text-center py-16">
        <svg class="mx-auto h-12 w-12 text-gray-300 dark:text-gray-600" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
        </svg>
        @if ($search)
            <h3 class="mt-4 text-lg font-medium text-gray-900 dark:text-white">No listings match &ldquo;{{ e($search) }}&rdquo;</h3>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Try a different search term or browse all listings.</p>
            <a href="/" class="mt-6 inline-flex items-center rounded-lg bg-teal-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-teal-500 transition">Clear &amp; browse all</a>
        @else
            <svg class="mx-auto h-12 w-12 text-gray-300 dark:text-gray-600" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75a24.02 24.02 0 01-7.827-1.23 2.18 2.18 0 01-.673-.38m0 0a2.18 2.18 0 01-.75-1.661v-4.25c0-1.081.768-2.015 1.837-2.175a48.086 48.086 0 013.413-.388m0 0c.015.323.04.645.073.967" />
            </svg>
            <h3 class="mt-4 text-lg font-medium text-gray-900 dark:text-white">No listings yet</h3>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Be the first to post a listing!</p>
            <a href="/jobs/create" class="mt-6 inline-flex items-center rounded-lg bg-teal-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-teal-500 transition">Post a Listing</a>
        @endif
    </div>
@endforelse

{{-- Pagination --}}
<div class="mt-12 mb-4">
    {{ $jobs->appends(request()->only('search'))->links() }}
</div>
