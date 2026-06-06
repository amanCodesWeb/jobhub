<x-admin-layout>
    @php $backUrl = route('admin.jobs.index') @endphp
    <x-slot:heading>Edit Listing #{{ $job->id }}: {{ $job->title }}</x-slot:heading>

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

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Left: Form --}}
        <div class="lg:col-span-2 space-y-6">
            <form method="POST" action="{{ route('admin.jobs.update', $job) }}" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl p-6 sm:p-8 shadow-sm">
                @csrf
                @method('PATCH')

                <div class="space-y-6">
                    {{-- User assign --}}
                    <div>
                        <label for="user_id" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1.5">Posted By</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-gray-400">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                </svg>
                            </div>
                            <select id="user_id" name="user_id"
                                class="block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 pl-10 pr-3 py-2.5 text-sm text-gray-900 dark:text-white focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition">
                                <option value="">Reassign (optional)</option>
                                @foreach (\App\Models\User::all() as $u)
                                    <option value="{{ $u->id }}" {{ $job->user_id == $u->id ? 'selected' : '' }}>
                                        {{ $u->first_name }} {{ $u->last_name }} ({{ $u->email }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Title --}}
                    <div>
                        <label for="title" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1.5">Job Title</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-gray-400">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75a24.02 24.02 0 01-7.827-1.23 2.18 2.18 0 01-.673-.38m0 0a2.18 2.18 0 01-.75-1.661v-4.25c0-1.081.768-2.015 1.837-2.175a48.086 48.086 0 013.413-.388" />
                                </svg>
                            </div>
                            <input id="title" type="text" name="title" value="{{ old('title', $job->title) }}"
                                class="block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 pl-10 pr-3 py-2.5 text-sm text-gray-900 dark:text-white placeholder:text-gray-400 focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition @error('title') border-red-400 @enderror"
                                required />
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
                            <input id="company_name" type="text" name="company_name" value="{{ old('company_name', $job->company_name) }}"
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
                            <input id="location" type="text" name="location" value="{{ old('location', $job->location) }}"
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
                                    <option value="{{ $cat->id }}" {{ old('category_id', $job->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('category_id')
                            <p class="mt-1.5 text-xs text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Salary --}}
                    <div>
                        <label for="salary" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1.5">Salary ($ per day)</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-gray-400">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <input id="salary" type="number" name="salary" value="{{ old('salary', $job->salary) }}"
                                class="block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 pl-10 pr-3 py-2.5 text-sm text-gray-900 dark:text-white placeholder:text-gray-400 focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition @error('salary') border-red-400 @enderror"
                                min="100" required />
                        </div>
                        @error('salary')
                            <p class="mt-1.5 text-xs text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Status --}}
                    <div>
                        <label for="status" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1.5">Listing Status</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-gray-400">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <select id="status" name="status"
                                class="block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 pl-10 pr-3 py-2.5 text-sm text-gray-900 dark:text-white focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition @error('status') border-red-400 @enderror">
                                <option value="pending" {{ old('status', $job->status) === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="approved" {{ old('status', $job->status) === 'approved' ? 'selected' : '' }}>Approved</option>
                                <option value="rejected" {{ old('status', $job->status) === 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                        </div>
                        @error('status')
                            <p class="mt-1.5 text-xs text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div>
                        <label for="description" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1.5">Description</label>
                        <textarea id="description" name="description" rows="6"
                            class="block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 px-3 py-2.5 text-sm text-gray-900 dark:text-white placeholder:text-gray-400 focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition @error('description') border-red-400 @enderror"
                            required>{{ old('description', $job->description) }}</textarea>
                        @error('description')
                            <p class="mt-1.5 text-xs text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Actions --}}
                <div class="mt-8 pt-6 border-t border-gray-100 dark:border-gray-700 flex items-center justify-end gap-4">
                    <a href="{{ route('admin.jobs.index') }}" class="rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 px-5 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        Cancel
                    </a>
                    <button type="submit"
                        class="inline-flex items-center gap-2 rounded-lg bg-teal-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 transition">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                        </svg>
                        Update Listing
                    </button>
                </div>
            </form>

            {{-- Danger Zone --}}
            <div class="bg-white dark:bg-gray-900 border border-red-200 dark:border-red-800/50 rounded-xl p-6 shadow-sm">
                <h3 class="text-base font-semibold text-red-700 mb-2 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                    </svg>
                    Danger Zone
                </h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">Move this job listing to the trash. It can be restored or permanently deleted from the Trashed tab.</p>
                <div class="flex items-center justify-between p-4 bg-red-50 dark:bg-red-900/20 border border-red-100 dark:border-red-800 rounded-lg">
                    <div>
                        <p class="text-sm font-medium text-gray-900 dark:text-white">Delete "{{ $job->title }}"</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">#{{ $job->id }} · ${{ number_format($job->salary) }}/day</p>
                    </div>
                    <button type="button" onclick="confirmJobDelete()"
                        class="inline-flex items-center gap-2 rounded-lg bg-red-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 transition">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c-1.18-.91 2.164-2.09 2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                        Delete Listing
                    </button>
                </div>
            </div>

            {{-- Hidden delete form --}}
            <form method="POST" action="{{ route('admin.jobs.destroy', $job) }}" id="delete-job-form" class="hidden">
                @csrf
                @method('DELETE')
            </form>

            <script>
                function confirmJobDelete() {
                    if (confirm('Move "{{ $job->title }}" (#' + {{ $job->id }} + ') to trash? You can restore it from the Trashed tab.')) {
                        document.getElementById('delete-job-form').submit();
                    }
                }
            </script>
        </div>

        {{-- Right: Job Info sidebar --}}
        <div class="space-y-6">
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl p-5 shadow-sm">
                <h4 class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-3">Listing Info</h4>
                <div class="space-y-3 text-sm">
                    <div class="flex justify-between py-2 border-b border-gray-100 dark:border-gray-700">
                        <span class="text-gray-500 dark:text-gray-400">ID</span>
                        <span class="font-medium text-gray-900 dark:text-white">#{{ $job->id }}</span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-gray-100 dark:border-gray-700">
                        <span class="text-gray-500 dark:text-gray-400">Status</span>
                        @php
                            $badgeClasses = [
                                'approved' => 'bg-green-50 dark:bg-green-900/30 text-green-700 dark:text-green-300 border-green-200 dark:border-green-800',
                                'pending'  => 'bg-amber-50 dark:bg-amber-900/30 text-amber-700 dark:text-amber-300 border-amber-200 dark:border-amber-800',
                                'rejected' => 'bg-red-50 dark:bg-red-900/30 text-red-700 dark:text-red-300 border-red-200 dark:border-red-800',
                            ];
                        @endphp
                        <span class="inline-flex items-center rounded-full px-2 py-0.5 text-xs font-medium border {{ $badgeClasses[$job->status] ?? 'bg-gray-50 dark:bg-gray-800 text-gray-600 dark:text-gray-400 border-gray-200 dark:border-gray-700' }}">
                            {{ ucfirst($job->status) }}
                        </span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-gray-100 dark:border-gray-700">
                        <span class="text-gray-500 dark:text-gray-400">Salary</span>
                        <span class="font-medium text-teal-600 dark:text-teal-400">${{ number_format($job->salary) }}/day</span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-gray-100 dark:border-gray-700">
                        <span class="text-gray-500 dark:text-gray-400">Category</span>
                        <span class="text-gray-900 dark:text-white">{{ $job->category->name ?? 'Uncategorized' }}</span>
                    </div>
                    @if ($job->location)
                        <div class="flex justify-between py-2 border-b border-gray-100 dark:border-gray-700">
                            <span class="text-gray-500 dark:text-gray-400">Location</span>
                            <span class="text-gray-900 dark:text-white">{{ $job->location }}</span>
                        </div>
                    @endif
                    <div class="flex justify-between py-2">
                        <span class="text-gray-500 dark:text-gray-400">Created</span>
                        <span class="text-gray-900 dark:text-white">{{ $job->created_at->format('M d, Y') }}</span>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-teal-50 dark:from-teal-900/20 to-teal-100/50 dark:to-teal-800/20 border border-teal-200 dark:border-teal-800 rounded-xl p-5 text-center shadow-sm">
                <div class="mb-3 inline-flex items-center justify-center w-14 h-14 rounded-full bg-teal-100 dark:bg-teal-900/30 border border-teal-200 dark:border-teal-800">
                    <svg class="w-7 h-7 text-teal-500 dark:text-teal-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75a24.02 24.02 0 01-7.827-1.23 2.18 2.18 0 01-.673-.38m0 0a2.18 2.18 0 01-.75-1.661v-4.25c0-1.081.768-2.015 1.837-2.175a48.086 48.086 0 013.413-.388" />
                    </svg>
                </div>
                <h4 class="text-sm font-semibold text-teal-800 dark:text-teal-300">Admin Management</h4>
                <p class="text-xs text-teal-600 dark:text-teal-400 mt-1">From here you can edit listing details, approve/reject, or move to trash.</p>
            </div>
        </div>
    </div>
</x-admin-layout>