<x-layout>
    @php $backUrl = '/' @endphp
    <x-slot:heading>Create New Job Listing</x-slot:heading>

    {{-- Error summary --}}
    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-50 dark:bg-red-900/30 border border-red-200 dark:border-red-800 text-red-700 dark:text-red-300 rounded-xl">
            <div class="flex items-center gap-2 mb-2">
                <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                </svg>
                <span class="text-sm font-semibold">Please fix the following errors:</span>
            </div>
            <ul class="list-disc list-inside text-sm space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        {{-- ============ LEFT COLUMN: FORM ============ --}}
        <div class="lg:col-span-2">
            <form method="POST" action="/jobs" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl p-6 sm:p-8 shadow-sm">
                @csrf

                <div class="space-y-6">
                    {{-- Title --}}
                    <div>
                        <label for="title" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1.5">Job Title <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-gray-400">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75a24.02 24.02 0 01-7.827-1.23 2.18 2.18 0 01-.673-.38m0 0a2.18 2.18 0 01-.75-1.661v-4.25c0-1.081.768-2.015 1.837-2.175a48.086 48.086 0 013.413-.388" />
                                </svg>
                            </div>
                            <input id="title" type="text" name="title" value="{{ old('title') }}"
                                class="block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 pl-10 pr-3 py-2.5 text-sm text-gray-900 dark:text-white placeholder:text-gray-400 focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition @error('title') border-red-400 @enderror"
                                placeholder="e.g. Senior Laravel Developer" required />
                        </div>
                        @error('title')
                            <p class="mt-1.5 text-xs text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Company Name --}}
                    <div>
                        <label for="company_name" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1.5">Company Name</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-gray-400">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-.75 3h1.5m-1.5 3h1.5m6-12h1.5m-1.5 3h1.5m-.75 3h1.5m-1.5 3h1.5" />
                                </svg>
                            </div>
                            <input id="company_name" type="text" name="company_name" value="{{ old('company_name') }}"
                                class="block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 pl-10 pr-3 py-2.5 text-sm text-gray-900 dark:text-white placeholder:text-gray-400 focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition @error('company_name') border-red-400 @enderror"
                                placeholder="e.g. Acme Corp" />
                        </div>
                        @error('company_name')
                            <p class="mt-1.5 text-xs text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Location --}}
                    <div>
                        <label for="location" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1.5">Location</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-gray-400">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                </svg>
                            </div>
                            <input id="location" type="text" name="location" value="{{ old('location') }}"
                                class="block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 pl-10 pr-3 py-2.5 text-sm text-gray-900 dark:text-white placeholder:text-gray-400 focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition @error('location') border-red-400 @enderror"
                                placeholder="e.g. San Francisco, CA or Remote" />
                        </div>
                        @error('location')
                            <p class="mt-1.5 text-xs text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Category --}}
                    <div>
                        <label for="category_id" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1.5">Category</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-gray-400">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                                </svg>
                            </div>
                            <select id="category_id" name="category_id"
                                class="block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 pl-10 pr-3 py-2.5 text-sm text-gray-900 dark:text-white focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition @error('category_id') border-red-400 @enderror">
                                <option value="">— Select Category —</option>
                                @foreach (\App\Models\Category::orderBy('name')->get() as $cat)
                                    <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('category_id')
                            <p class="mt-1.5 text-xs text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Salary --}}
                    <div>
                        <label for="salary" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1.5">Salary ($ per day) <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-gray-400">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <input id="salary" type="number" name="salary" value="{{ old('salary') }}"
                                class="block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 pl-10 pr-3 py-2.5 text-sm text-gray-900 dark:text-white placeholder:text-gray-400 focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition @error('salary') border-red-400 @enderror"
                                placeholder="e.g. 500" min="100" required />
                        </div>
                        @error('salary')
                            <p class="mt-1.5 text-xs text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div>
                        <label for="description" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1.5">Description <span class="text-red-500">*</span></label>
                        <textarea id="description" name="description" rows="6"
                            class="block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 px-3 py-2.5 text-sm text-gray-900 dark:text-white placeholder:text-gray-400 focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition @error('description') border-red-400 @enderror"
                            placeholder="Describe the role, responsibilities, requirements, and any other relevant details..." required>{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1.5 text-xs text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Actions --}}
                <div class="mt-8 pt-6 border-t border-gray-100 dark:border-gray-700 flex items-center justify-end gap-4">
                    <a href="/"
                       class="rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 px-5 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        Cancel
                    </a>
                    <button type="submit"
                        class="inline-flex items-center gap-2 rounded-lg bg-teal-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 transition">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Post Listing
                    </button>
                </div>
            </form>
        </div>

        {{-- ============ RIGHT COLUMN: TIPS & GUIDANCE ============ --}}
        <div class="space-y-6">

            {{-- Tips card --}}
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl p-5 shadow-sm">
                <h3 class="text-sm font-semibold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                    <svg class="w-4 h-4 text-teal-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 001.5-.189m-1.5.189a6.01 6.01 0 01-1.5-.189m3.75 7.478a12.06 12.06 0 01-4.5 0m3.75 2.383a14.406 14.406 0 01-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 10-7.517 0c.85.493 1.509 1.333 1.509 2.316V18" />
                    </svg>
                    Tips for a Great Job Post
                </h3>
                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <div class="w-7 h-7 rounded-full bg-teal-100 dark:bg-teal-900/30 flex items-center justify-center shrink-0 mt-0.5">
                            <span class="text-xs font-bold text-teal-700 dark:text-teal-300">1</span>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900 dark:text-white">Clear title</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Use a specific title like "Senior Laravel Developer" not just "Developer".</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-7 h-7 rounded-full bg-teal-100 flex items-center justify-center shrink-0 mt-0.5">
                            <span class="text-xs font-bold text-teal-700 dark:text-teal-300">2</span>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900 dark:text-white">Competitive salary</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">List a realistic daily rate to attract serious candidates right away.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-7 h-7 rounded-full bg-teal-100 flex items-center justify-center shrink-0 mt-0.5">
                            <span class="text-xs font-bold text-teal-700 dark:text-teal-300">3</span>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900 dark:text-white">Detailed description</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Include responsibilities, tech stack, requirements, and what makes this role great.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-7 h-7 rounded-full bg-teal-100 flex items-center justify-center shrink-0 mt-0.5">
                            <span class="text-xs font-bold text-teal-700 dark:text-teal-300">4</span>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900 dark:text-white">Keep it scannable</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Use short paragraphs and bullet points so candidates can quickly assess fit.</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Preview hint card --}}
            <div class="bg-gradient-to-br from-blue-50 dark:from-blue-900/20 to-blue-100/50 dark:to-blue-800/20 border border-blue-200 dark:border-blue-800 rounded-xl p-5 text-center shadow-sm">
                <div class="mb-3 inline-flex items-center justify-center w-14 h-14 rounded-full bg-blue-100 dark:bg-blue-900/30 border border-blue-200 dark:border-blue-800">
                    <svg class="w-7 h-7 text-blue-500 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <h4 class="text-sm font-semibold text-blue-800 dark:text-blue-300">Visible to everyone</h4>
                <p class="text-xs text-blue-600 dark:text-blue-400 mt-1">Your listing will be publicly visible on the homepage once posted. Make sure all details are correct before publishing.</p>
            </div>

            {{-- Decorative illustration card --}}
            <div class="bg-gradient-to-br from-teal-50 dark:from-teal-900/20 to-emerald-100/50 dark:to-emerald-800/20 border border-teal-200 dark:border-teal-800 rounded-xl p-5 text-center shadow-sm">
                <div class="flex justify-center gap-2 mb-3">
                    <div class="w-8 h-8 rounded-lg bg-teal-100 dark:bg-teal-900/30 flex items-center justify-center">
                        <svg class="w-4 h-4 text-teal-600 dark:text-teal-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                        </svg>
                    </div>
                    <div class="w-8 h-8 rounded-lg bg-amber-100 dark:bg-amber-900/30 flex items-center justify-center">
                        <svg class="w-4 h-4 text-amber-600 dark:text-amber-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="w-8 h-8 rounded-lg bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center">
                        <svg class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387" />
                        </svg>
                    </div>
                </div>
                <h4 class="text-sm font-semibold text-teal-800 dark:text-teal-300">Reach top talent</h4>
                <p class="text-xs text-teal-600 dark:text-teal-400 mt-1">Your listing will be seen by qualified candidates looking for their next opportunity.</p>
            </div>

        </div>
    </div>
</x-layout>
