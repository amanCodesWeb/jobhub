<x-layout>
    <x-slot:heading>About Us</x-slot:heading>

    {{-- Hero --}}
    <div class="relative isolate overflow-hidden bg-gray-900 py-24 sm:py-32 rounded-2xl mb-16">
        <div class="absolute inset-0 -z-10 opacity-20">
            <svg class="absolute inset-0 h-full w-full" viewBox="0 0 1440 600" fill="none">
                <defs><pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse"><path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="0.5"/></pattern></defs>
                <rect width="1440" height="600" fill="url(#grid)" />
            </svg>
        </div>
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h1 class="text-5xl font-bold tracking-tight text-white sm:text-6xl">We connect talent with opportunity</h1>
                <p class="mt-6 text-lg leading-8 text-gray-300">
                    ListingHub is a community-driven job board where employers post opportunities and job seekers discover their next career move. We believe finding the right job should be simple and accessible to everyone.
                </p>
                <div class="mt-10 flex items-center justify-center gap-x-6">
                    <a href="/register" class="rounded-md bg-teal-600 px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-teal-500">Get Started</a>
                    <a href="/jobs" class="text-sm font-semibold leading-6 text-white">Browse Jobs <span aria-hidden="true">&rarr;</span></a>
                </div>
            </div>
        </div>
    </div>

    {{-- Stats --}}
    <div class="mx-auto max-w-7xl px-6 lg:px-8 mb-20">
        <dl class="grid grid-cols-1 gap-x-8 gap-y-16 text-center sm:grid-cols-3">
            <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                <dt class="text-base leading-7 text-gray-600 dark:text-gray-400">Jobs Posted</dt>
                <dd class="order-first text-4xl font-bold tracking-tight text-teal-600 sm:text-5xl">12,847+</dd>
            </div>
            <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                <dt class="text-base leading-7 text-gray-600 dark:text-gray-400">Happy Candidates</dt>
                <dd class="order-first text-4xl font-bold tracking-tight text-teal-600 sm:text-5xl">8,432+</dd>
            </div>
            <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                <dt class="text-base leading-7 text-gray-600 dark:text-gray-400">Trusted Companies</dt>
                <dd class="order-first text-4xl font-bold tracking-tight text-teal-600 sm:text-5xl">2,194+</dd>
            </div>
        </dl>
    </div>

    {{-- Mission & Vision --}}
    <div class="mx-auto max-w-7xl px-6 lg:px-8 mb-20">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-2xl p-8 shadow-sm">
                <div class="w-12 h-12 bg-teal-100 dark:bg-teal-900/30 rounded-xl flex items-center justify-center mb-5">
                    <svg class="w-6 h-6 text-teal-600 dark:text-teal-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 0 0 1.5-.189m-1.5.189a6.01 6.01 0 0 1-1.5-.189m3.75 7.478a12.06 12.06 0 0 1-4.5 0m3.75 2.383a14.406 14.406 0 0 1-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 1 0-7.517 0c.85.493 1.509 1.333 1.509 2.316V18" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Our Mission</h3>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                               To bridge the gap between talented professionals and innovative companies.We're building a platform where every job listing is vetted, every application is valued, and every connection leads to growth.
                </p>
            </div>
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-2xl p-8 shadow-sm">
                <div class="w-12 h-12 bg-amber-100 dark:bg-amber-900/30 rounded-xl flex items-center justify-center mb-5">
                    <svg class="w-6 h-6 text-amber-600 dark:text-amber-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Our Vision</h3>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                    A world where finding meaningful work is effortless. We envision a future where job seekers spend less time searching and more time doing what they love — and employers find the perfect fit faster than ever.
                </p>
            </div>
        </div>
    </div>

    {{-- Team --}}
    <div class="mx-auto max-w-7xl px-6 lg:px-8 mb-20">
        <div class="mx-auto max-w-2xl text-center mb-12">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Meet Our Team</h2>
            <p class="mt-2 text-lg text-gray-600 dark:text-gray-400">The people behind ListingHub</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-2xl p-6 text-center shadow-sm hover:shadow-md transition-shadow">
                <div class="mx-auto h-20 w-20 rounded-full bg-gradient-to-br from-teal-400 to-teal-600 flex items-center justify-center text-2xl font-bold text-white mb-4">JD</div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Jane Doe</h3>
                <p class="text-sm text-teal-600 font-medium">CEO & Founder</p>
                <p class="mt-3 text-sm text-gray-500 dark:text-gray-400">10+ years in HR tech. Passionate about connecting people with their dream careers.</p>
            </div>
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-2xl p-6 text-center shadow-sm hover:shadow-md transition-shadow">
                <div class="mx-auto h-20 w-20 rounded-full bg-gradient-to-br from-amber-400 to-amber-600 flex items-center justify-center text-2xl font-bold text-white mb-4">MS</div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Mike Santos</h3>
                <p class="text-sm text-teal-600 font-medium">CTO</p>
                <p class="mt-3 text-sm text-gray-500 dark:text-gray-400">Full-stack developer and architect. Built platforms serving 2M+ users.</p>
            </div>
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-2xl p-6 text-center shadow-sm hover:shadow-md transition-shadow">
                <div class="mx-auto h-20 w-20 rounded-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center text-2xl font-bold text-white mb-4">AL</div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Anna Liu</h3>
                <p class="text-sm text-teal-600 font-medium">Head of Design</p>
                <p class="mt-3 text-sm text-gray-500 dark:text-gray-400">Designing intuitive experiences that make job hunting feel less like work.</p>
            </div>
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-2xl p-6 text-center shadow-sm hover:shadow-md transition-shadow">
                <div class="mx-auto h-20 w-20 rounded-full bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center text-2xl font-bold text-white mb-4">TR</div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Tara Rivera</h3>
                <p class="text-sm text-teal-600 font-medium">Community Lead</p>
                <p class="mt-3 text-sm text-gray-500 dark:text-gray-400">Building relationships with employers and candidates across the globe.
            </div>
        </div>
    </div>

    {{-- CTA --}}
    <div class="mx-auto max-w-7xl px-6 lg:px-8 mb-20">
        <div class="relative isolate overflow-hidden bg-gradient-to-r from-teal-600 to-teal-500 px-6 py-16 sm:px-16 rounded-2xl text-center shadow-lg">
            <div class="mx-auto max-w-xl">
                <h2 class="text-3xl font-bold tracking-tight text-white">Ready to find your next opportunity?</h2>
                <p class="mt-4 text-lg text-teal-100">Join thousands of professionals already using ListingHub.</p>
                <a href="/register" class="mt-8 inline-block rounded-lg bg-white px-8 py-3 text-sm font-semibold text-teal-600 shadow-sm hover:bg-teal-50">Create Free Account</a>
            </div>
        </div>
    </div>
</x-layout>
