<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $tab = $request->query('tab', 'users');

        $users = match ($tab) {
            'admins' => User::withCount('jobs')->where('is_admin', true)->latest()->paginate(20),
            default  => User::withCount('jobs')->where('is_admin', false)->latest()->paginate(20),
        };

        return view('admin.users.index', ['users' => $users, 'currentTab' => $tab]);
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'  => ['required', 'string', 'max:255'],
            'email'      => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'is_admin'   => ['boolean'],
        ]);

        $user->update($validated);

        $tab = $request->input('tab', 'users');

        return redirect()->route('admin.users.index', ['tab' => $tab])
            ->with('success', "User {$user->first_name} {$user->last_name} updated.");
    }

    public function updatePassword(Request $request, User $user)
    {
        $validated = $request->validate([
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user->update([
            'password' => Hash::make($validated['password']),
        ]);

        $tab = $request->input('tab', 'users');

        return redirect()->route('admin.users.edit', ['user' => $user, 'tab' => $tab])
            ->with('success', 'Password updated successfully.');
    }

    public function destroy(Request $request, User $user)
    {
        if ($user->is(auth()->user())) {
            return redirect()->route('admin.users.index', ['tab' => $request->input('tab', 'users')])
                ->with('error', 'You cannot delete your own account.');
        }

        $user->jobs()->delete();
        $user->delete();

        return redirect()->route('admin.users.index', ['tab' => $request->input('tab', 'users')])
            ->with('success', "User {$user->first_name} {$user->last_name} deleted.");
    }
}
