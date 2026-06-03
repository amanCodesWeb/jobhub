<x-layout>
    @php $backUrl = '/' @endphp
    <x-slot:heading>{{ $job->title }}</x-slot:heading>

    @if (session('success'))
        <div class="mb-6 flex items-center gap-3 p-4 bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 text-green-700 dark:text-green-300 rounded-xl">
            <svg class="w-5 h-5 shrink-0 text-green-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p class="text-sm font-medium">{{ session('success') }}</p>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        {{-- ============ LEFT COLUMN: MAIN CONTENT ============ --}}
        <div class="lg:col-span-2 space-y-6">

            {{-- Main job card --}}
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl overflow-hidden shadow-sm">
                {{-- Gradient header --}}
                <div class="bg-gradient-to-r from-teal-600 to-teal-500 px-6 py-6">
                    <div class="flex items-start justify-between">
                        <div>
                            <h2 class="text-2xl font-bold text-white">{{ $job->title }}</h2>
                            <div class="mt-2 flex items-center gap-3 text-sm text-teal-100">
                                <span>Posted {{ $job->created_at->diffForHumans() }}</span>
                                <span class="text-teal-300">&#183;</span>
                                <span>ID: #{{ $job->id }}</span>
                            </div>
                        </div>
                        <span class="inline-flex items-center rounded-full bg-white/20 px-3 py-1 text-sm font-semibold text-white backdrop-blur-sm shrink-0">
                            ${{ number_format($job->salary) }}/day
                        </span>
                    </div>
                </div>

                {{-- Body --}}
                <div class="p-6 space-y-6">
                    {{-- Meta info grid --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div class="flex items-center gap-3 p-4 bg-gray-50 dark:bg-gray-800 border border-gray-100 dark:border-gray-600 rounded-lg">
                            <div class="w-10 h-10 flex items-center justify-center rounded-lg bg-teal-100 dark:bg-teal-900/50 text-teal-600 dark:text-teal-400">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Posted by</p>
                                <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $job->user->first_name }} {{ $job->user->last_name }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 p-4 bg-gray-50 dark:bg-gray-800 border border-gray-100 dark:border-gray-600 rounded-lg">
                            <div class="w-10 h-10 flex items-center justify-center rounded-lg bg-amber-100 dark:bg-amber-900/50 text-amber-600 dark:text-amber-400">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Salary</p>
                                <p class="text-sm font-medium text-gray-900 dark:text-white">${{ number_format($job->salary) }} / day</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 p-4 bg-gray-50 dark:bg-gray-800 border border-gray-100 dark:border-gray-600 rounded-lg">
                            <div class="w-10 h-10 flex items-center justify-center rounded-lg bg-blue-100 dark:bg-blue-900/50 text-blue-600 dark:text-blue-400">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-.75 3h1.5m-1.5 3h1.5m6-12h1.5m-1.5 3h1.5m-.75 3h1.5m-1.5 3h1.5" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Company</p>
                                <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $job->company_name ?? ($job->user->first_name . ' ' . $job->user->last_name) }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 p-4 bg-gray-50 dark:bg-gray-800 border border-gray-100 dark:border-gray-600 rounded-lg">
                            <div class="w-10 h-10 flex items-center justify-center rounded-lg bg-purple-100 dark:bg-purple-900/50 text-purple-600 dark:text-purple-400">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Category</p>
                                <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $job->category->name ?? 'Uncategorized' }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Description --}}
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Job Description</h3>
                        <div class="text-gray-700 dark:text-gray-300 leading-relaxed whitespace-pre-line">
                            {{ $job->description }}
                        </div>
                    </div>
                </div>
            </div>

            {{-- Action buttons --}}
            @can('modify', $job)
                <div class="flex items-center gap-4">
                    <a href="/jobs/{{ $job->id }}/edit"
                       class="inline-flex items-center gap-2 rounded-lg bg-teal-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-teal-500 transition">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                        Edit Job
                    </a>
                    <a href="/"
                       class="inline-flex items-center gap-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 px-5 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Back to Listings
                    </a>
                </div>
            @else
                <div>
                    <a href="/"
                       class="inline-flex items-center gap-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 px-5 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Back to Listings
                    </a>
                </div>
            @endcan
        </div>

        {{-- ============ RIGHT COLUMN: SIDEBAR ============ --}}
        <div class="space-y-6">

            {{-- Quick Stats Card --}}
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl p-5 shadow-sm">
                <h3 class="text-sm font-semibold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                    <svg class="w-4 h-4 text-teal-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    Job Overview
                </h3>
                <div class="space-y-3">
                    <div class="flex items-center justify-between py-2 border-b border-gray-100 dark:border-gray-700 last:border-0">
                        <span class="text-sm text-gray-500 dark:text-gray-400">Status</span>
                        <span class="inline-flex items-center rounded-full bg-green-50 dark:bg-green-900/30 px-2.5 py-0.5 text-xs font-medium text-green-700 dark:text-green-300 border border-green-200 dark:border-green-800">Active</span>
                    </div>
                    <div class="flex items-center justify-between py-2 border-b border-gray-100 dark:border-gray-700 last:border-0">
                        <span class="text-sm text-gray-500 dark:text-gray-400">Job ID</span>
                        <span class="text-sm font-medium text-gray-900 dark:text-white">#{{ $job->id }}</span>
                    </div>
                    <div class="flex items-center justify-between py-2 border-b border-gray-100 dark:border-gray-700 last:border-0">
                        <span class="text-sm text-gray-500 dark:text-gray-400">Posted</span>
                        <span class="text-sm text-gray-900 dark:text-white">{{ $job->created_at->format('M d, Y') }}</span>
                    </div>
                    <div class="flex items-center justify-between py-2 border-b border-gray-100 dark:border-gray-700 last:border-0">
                        <span class="text-sm text-gray-500 dark:text-gray-400">Category</span>
                        <span class="text-sm text-gray-900 dark:text-white">Development</span>
                    </div>
                    <div class="flex items-center justify-between py-2 border-b border-gray-100 dark:border-gray-700 last:border-0">
                        <span class="text-sm text-gray-500 dark:text-gray-400">Company</span>
                        <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $job->company_name ?? ($job->user->first_name . ' ' . $job->user->last_name) }}</span>
                    </div>
                    <div class="flex items-center justify-between py-2 last:border-0">
                        <span class="text-sm text-gray-500 dark:text-gray-400">Salary Type</span>
                        <span class="text-sm text-gray-900 dark:text-white">Daily Rate</span>
                    </div>
                </div>
            </div>

            {{-- CTA Card --}}
            <div class="bg-gradient-to-br from-teal-600 to-teal-500 rounded-xl p-6 shadow-sm">
                <div class="text-center">
                    <div class="w-12 h-12 mx-auto rounded-full bg-white/20 flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75a24.02 24.02 0 01-7.827-1.23 2.18 2.18 0 01-.673-.38m0 0a2.18 2.18 0 01-.75-1.661v-4.25c0-1.081.768-2.015 1.837-2.175a48.086 48.086 0 013.413-.388" />
                        </svg>
                    </div>
                    <h4 class="mt-3 text-sm font-semibold text-white">Post Your Own Listing</h4>
                    <p class="mt-1 text-xs text-teal-100">Post your own listing and reach top candidates today</p>
                    @auth
                        <a href="/jobs/create"
                        class="mt-4 inline-flex items-center justify-center w-full rounded-lg bg-white px-4 py-2 text-sm font-semibold text-teal-700 shadow-sm hover:bg-teal-50 transition">
                            + Post a Listing
                        </a>
                    @else
                        <a href="/login"
                        class="mt-4 inline-flex items-center justify-center w-full rounded-lg bg-white px-4 py-2 text-sm font-semibold text-teal-700 shadow-sm hover:bg-teal-50 transition">
                            Sign in to Post
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-layout>