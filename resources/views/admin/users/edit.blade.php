<x-admin-layout>
    @php 
        $backUrl = route('admin.users.index', ['tab' => request('tab', 'users')]);
        $currentTab = request('tab', 'users');
    @endphp
    <x-slot:heading>Edit User: {{ $user->first_name }} {{ $user->last_name }}</x-slot:heading>

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

    {{-- User info header card --}}
    <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl p-6 shadow-sm mb-6">
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 rounded-full bg-gradient-to-br from-teal-400 to-teal-600 flex items-center justify-center text-white font-bold text-xl">
                {{ strtoupper(substr($user->first_name, 0, 1) . substr($user->last_name, 0, 1)) }}
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $user->first_name }} {{ $user->last_name }}</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}</p>
                <p class="text-xs text-gray-400 dark:text-gray-500 mt-0.5">Joined {{ $user->created_at->format('M d, Y') }} · {{ $user->jobs_count ?? 0 }} jobs posted</p>
            </div>
            <div class="ml-auto">
                @if ($user->is_admin)
                    <span class="inline-flex items-center rounded-full bg-amber-100 dark:bg-amber-900/30 px-3 py-1 text-xs font-semibold text-amber-800 dark:text-amber-300 border border-amber-200 dark:border-amber-800">Admin</span>
                @else
                    <span class="inline-flex items-center rounded-full bg-gray-100 dark:bg-gray-700 px-3 py-1 text-xs font-medium text-gray-600 dark:text-gray-300 border border-gray-200 dark:border-gray-600">User</span>
                @endif
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Left: Edit user details + Delete --}}
        <div class="lg:col-span-2 space-y-6">
            {{-- Edit user details --}}
            <form method="POST" action="{{ route('admin.users.update', $user) }}" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl p-6 shadow-sm">
                @csrf
                @method('PATCH')
                <input type="hidden" name="tab" value="{{ $currentTab }}">
                <h3 class="text-base font-semibold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                    <svg class="w-4 h-4 text-teal-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                    User Details
                </h3>
                <div class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="first_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">First Name</label>
                            <input id="first_name" type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}"
                                class="block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 px-3 py-2.5 text-sm text-gray-900 dark:text-white focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition" required />
                        </div>
                        <div>
                            <label for="last_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Last Name</label>
                            <input id="last_name" type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}"
                                class="block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 px-3 py-2.5 text-sm text-gray-900 dark:text-white focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition" required />
                        </div>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}"
                            class="block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 px-3 py-2.5 text-sm text-gray-900 dark:text-white focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition" required />
                    </div>
                    <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-gray-800 rounded-lg border border-gray-100 dark:border-gray-700">
                        <label for="is_admin" class="text-sm font-medium text-gray-700 dark:text-gray-300">Admin Role</label>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="is_admin" value="1" class="sr-only peer"
                                {{ old('is_admin', $user->is_admin) ? 'checked' : '' }}>
                            <div class="w-9 h-5 bg-gray-200 dark:bg-gray-600 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-teal-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-teal-600"></div>
                        </label>
                        <span class="text-xs text-gray-500 dark:text-gray-400">Grant administrator privileges</span>
                    </div>
                </div>
                <div class="mt-6 pt-4 border-t border-gray-100 dark:border-gray-700 flex items-center justify-end gap-4">
                    <a href="{{ route('admin.users.index', ['tab' => $currentTab]) }}" class="rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition">Cancel</a>
                    <button type="submit" class="rounded-lg bg-teal-600 px-4 py-2 text-sm font-semibold text-white hover:bg-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 transition">Save Changes</button>
                </div>
            </form>

            {{-- Danger Zone: Delete User --}}
            <div class="bg-white dark:bg-gray-900 border border-red-200 dark:border-red-800/50 rounded-xl p-6 shadow-sm">
                <h3 class="text-base font-semibold text-red-700 mb-2 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                    </svg>
                    Danger Zone
                </h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">Permanently delete this user and all their job listings. This action cannot be undone.</p>
                <div class="flex items-center justify-between p-4 bg-red-50 dark:bg-red-900/20 border border-red-100 dark:border-red-800 rounded-lg">
                    <div>
                        <p class="text-sm font-medium text-gray-900 dark:text-white">Delete {{ $user->first_name }} {{ $user->last_name }}</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Email: {{ $user->email }}{{ $user->is_admin ? ' · Admin' : '' }}</p>
                    </div>
                    <button type="button" onclick="confirmUserDelete()"
                        class="inline-flex items-center gap-2 rounded-lg bg-red-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 transition">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                        Delete User
                    </button>
                </div>
            </div>

            {{-- Hidden delete form --}}
            <form method="POST" action="{{ route('admin.users.destroy', $user) }}" id="delete-user-form" class="hidden">
                @csrf
                @method('DELETE')
                <input type="hidden" name="tab" value="{{ $currentTab }}">
            </form>

            <script>
                function confirmUserDelete() {
                    if (confirm('Are you sure you want to permanently delete "{{ $user->first_name }} {{ $user->last_name }}"? All their job listings will also be deleted. This cannot be undone.')) {
                        document.getElementById('delete-user-form').submit();
                    }
                }
            </script>
        </div>

        {{-- Right sidebar: Reset Password --}}
        <div class="space-y-6">
            <form method="POST" action="{{ route('admin.users.update-password', $user) }}" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl p-6 shadow-sm">
                @csrf
                @method('PATCH')
                <input type="hidden" name="tab" value="{{ $currentTab }}">
                <h3 class="text-base font-semibold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                    <svg class="w-4 h-4 text-amber-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                    </svg>
                    Reset Password
                </h3>
                <div class="space-y-4">
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">New Password</label>
                        <input id="password" type="password" name="password"
                            class="block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 px-3 py-2.5 text-sm text-gray-900 dark:text-white focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition" required />
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Confirm Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation"
                            class="block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 px-3 py-2.5 text-sm text-gray-900 dark:text-white focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition" required />
                    </div>
                </div>
                <div class="mt-6 pt-4 border-t border-gray-100 dark:border-gray-700">
                    <button type="submit" class="w-full rounded-lg bg-amber-600 px-4 py-2 text-sm font-semibold text-white hover:bg-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 transition">
                        Update Password
                    </button>
                </div>
            </form>

            {{-- Stats card --}}
            <div class="bg-gradient-to-br from-gray-50 dark:from-gray-800/50 to-gray-100/50 dark:to-gray-800/30 border border-gray-200 dark:border-gray-700 rounded-xl p-5 shadow-sm">
                <h4 class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-3">Account Info</h4>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-500 dark:text-gray-400">User ID</span>
                        <span class="font-medium text-gray-900 dark:text-white">#{{ $user->id }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500 dark:text-gray-400">Joined</span>
                        <span class="text-gray-900 dark:text-white">{{ $user->created_at->format('M d, Y') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500 dark:text-gray-400">Jobs Posted</span>
                        <span class="font-medium text-gray-900 dark:text-white">{{ $user->jobs_count ?? 0 }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500 dark:text-gray-400">Role</span>
                        <span class="font-medium {{ $user->is_admin ? 'text-amber-600 dark:text-amber-400' : 'text-gray-600 dark:text-gray-400' }}">{{ $user->is_admin ? 'Admin' : 'User' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>