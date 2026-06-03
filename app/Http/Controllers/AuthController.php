<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function create()
    {
        return view('pages.register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'  => ['required', 'string', 'max:255'],
            'email'      => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'   => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = User::create([
            'first_name' => $validated['first_name'],
            'last_name'  => $validated['last_name'],
            'email'      => $validated['email'],
            'password'   => Hash::make($validated['password']),
        ]);

        Auth::login($user);

        return redirect('/')->with('success', 'Account created successfully!');
    }

    public function login()
    {
        return view('pages.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    // ─── Admin Login (separate portal) ──────────────────────────────

    public function adminLogin()
    {
        return view('pages.admin-login');
    }

    public function adminAuthenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $user = Auth::user();

            if (! $user->is_admin) {
                Auth::logout();

                $request->session()->regenerateToken();

                return back()->withErrors([
                    'email' => 'This account does not have admin access.',
                ])->onlyInput('email');
            }

            $request->session()->regenerate();

            return redirect()->intended('/admin');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    // ─── Social Login: Google ───────────────────────────────────────

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $socialUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            Log::warning('Google login failed', ['error' => $e->getMessage()]);
            return redirect('/login')->withErrors(['email' => 'Google login failed. Please try again.']);
        }

        return $this->findOrCreateSocialUser($socialUser, 'google');
    }

    // ─── Social Login: GitHub ───────────────────────────────────────

    public function redirectToGitHub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGitHubCallback()
    {
        try {
            $socialUser = Socialite::driver('github')->user();
        } catch (\Exception $e) {
            Log::warning('GitHub login failed', ['error' => $e->getMessage()]);
            return redirect('/login')->withErrors(['email' => 'GitHub login failed. Please try again.']);
        }

        return $this->findOrCreateSocialUser($socialUser, 'github');
    }

    // ─── Shared social login logic ──────────────────────────────────

    private function findOrCreateSocialUser($socialUser, string $provider): \Illuminate\Http\RedirectResponse
    {
        $socialId  = $socialUser->getId();
        $email     = $socialUser->getEmail();
        $name      = $socialUser->getName();

        // 1) Try matching by social ID first
        $column = $provider . '_id';
        $user   = User::where($column, $socialId)->first();

        // 2) Fall back to email match
        if (! $user && $email) {
            $user = User::where('email', $email)->first();
            if ($user) {
                $user->update([$column => $socialId]);
            }
        }

        // 3) Create a new account if none found
        if (! $user) {
            $nameParts = explode(' ', $name, 2);
            $firstName = $nameParts[0] ?? 'User';
            $lastName  = $nameParts[1] ?? '';

            $user = User::create([
                'first_name' => $firstName,
                'last_name'  => $lastName,
                'email'      => $email ?? $socialId . '@' . $provider . '.placeholder',
                'password'   => Hash::make(Str::random(32)),
                $column      => $socialId,
            ]);
        }

        Auth::login($user);

        request()->session()->regenerate();

        return redirect()->intended('/');
    }
}
