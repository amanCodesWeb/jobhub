<?php

namespace App\Http\Controllers\Admin;

use App\Models\Job;
use App\Models\User;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'stats' => [
                'jobs_count' => Job::count(),
                'users_count' => User::count(),
                'admins_count' => User::where('is_admin', true)->count(),
            ],
        ]);
    }
}
