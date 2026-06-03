<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $stats = [
            'total'      => $user->jobs()->count(),
            'recent'     => $user->jobs()->where('created_at', '>=', now()->subDays(7))->count(),
            'oldest'     => $user->jobs()->oldest('created_at')->first(),
            'latest'     => $user->jobs()->latest('created_at')->first(),
        ];

        $listings = $user->jobs()->with('category')->latest()->take(5)->get();

        return view('user.dashboard', [
            'stats'    => $stats,
            'listings' => $listings,
        ]);
    }

    public function listings()
    {
        $user = auth()->user();
        $listings = $user->jobs()->with('category')->latest()->paginate(10);

        return view('user.listings', [
            'listings' => $listings,
        ]);
    }
}
