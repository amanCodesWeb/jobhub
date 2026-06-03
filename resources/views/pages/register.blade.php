<x-layout>
    <x-slot:heading></x-slot:heading>

    <div class="min-h-[70vh] flex items-center justify-center py-12">
        <div class="w-full max-w-lg">
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-2xl shadow-sm p-8 sm:p-10">
                {{-- Header --}}
                <div class="text-center mb-8">
                    <div class="mx-auto w-12 h-12 bg-amber-100 dark:bg-amber-900/30 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-amber-600 dark:text-amber-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Create your account</h2>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Join thousands of professionals on ListingHub</p>

                    @if ($errors->any())
                        <div class="mt-4 p-3 bg-red-50 dark:bg-red-900/30 border border-red-200 dark:border-red-800 rounded-lg text-sm text-red-700 dark:text-red-300 text-left">
                            <ul class="list-disc list-inside space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                {{-- Form --}}
                <form method="POST" action="/register" class="space-y-5">
                    @csrf

                    {{-- Name row --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="first_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">First name</label>
                            <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}"
                                class="block w-full rounded-lg border border-gray-300 dark:border-gray-600 px-4 py-3 text-sm text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 dark:bg-gray-800 shadow-xs focus:border-teal-500 focus:ring-2 focus:ring-teal-200 focus:outline-none transition"
                                placeholder="Jane" required />
                            @error('first_name')
                                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="last_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Last name</label>
                            <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}"
                                class="block w-full rounded-lg border border-gray-300 dark:border-gray-600 px-4 py-3 text-sm text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 dark:bg-gray-800 shadow-xs focus:border-teal-500 focus:ring-2 focus:ring-teal-200 focus:outline-none transition"
                                placeholder="Doe" required />
                            @error('last_name')
                                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Email --}}
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Email address</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                            class="block w-full rounded-lg border border-gray-300 dark:border-gray-600 px-4 py-3 text-sm text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 dark:bg-gray-800 shadow-xs focus:border-teal-500 focus:ring-2 focus:ring-teal-200 focus:outline-none transition"
                            placeholder="you@example.com" required />
                        @error('email')
                            <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Password</label>
                        <input type="password" name="password" id="password"
                            class="block w-full rounded-lg border border-gray-300 dark:border-gray-600 px-4 py-3 text-sm text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 dark:bg-gray-800 shadow-xs focus:border-teal-500 focus:ring-2 focus:ring-teal-200 focus:outline-none transition"
                            placeholder="At least 8 characters" required />
                        @error('password')
                            <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Confirm Password --}}
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Confirm password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="block w-full rounded-lg border border-gray-300 dark:border-gray-600 px-4 py-3 text-sm text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 dark:bg-gray-800 shadow-xs focus:border-teal-500 focus:ring-2 focus:ring-teal-200 focus:outline-none transition"
                            placeholder="Re-enter your password" required />
                    </div>

                    {{-- Terms --}}
                    <div class="flex items-start gap-3">
                        <input id="terms" name="terms" type="checkbox" value="1" required
                            class="mt-1 h-4 w-4 rounded border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-teal-600 focus:ring-teal-500" />
                        <label for="terms" class="text-sm text-gray-500 dark:text-gray-400 select-none">
                            I agree to the
                            <a href="#" class="font-medium text-teal-600 dark:text-teal-400 hover:text-teal-500">Terms of Service</a>
                            and
                            <a href="#" class="font-medium text-teal-600 dark:text-teal-400 hover:text-teal-500">Privacy Policy</a>
                        </label>
                    </div>

                    {{-- Submit --}}
                    <button type="submit"
                        class="w-full rounded-lg bg-teal-600 px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 transition">
                        Create Account
                    </button>
                </form>

                {{-- Footer link --}}
                <p class="mt-8 text-center text-sm text-gray-500 dark:text-gray-400">
                    Already have an account?
                    <a href="/login" class="font-medium text-teal-600 dark:text-teal-400 hover:text-teal-500 transition-colors">Sign in</a>
                </p>
            </div>
        </div>
    </div>
</x-layout>
