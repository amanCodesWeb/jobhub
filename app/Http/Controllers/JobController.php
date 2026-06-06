<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $query = Job::with('user')->approved();

        if ($search = $request->query('search')) {
            $search = trim($search);
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('company_name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
            });
        }

        $jobs = $query->paginate(5);

        // AJAX request: return JSON with rendered partial
        if ($request->ajax() || $request->query('ajax')) {
            $html = view('partials._job-listings', [
                'jobs' => $jobs,
                'search' => $search ?? null,
            ])->render();

            $heading = $search
                ? 'Search results for &ldquo;' . e($search) . '&rdquo;'
                : 'Latest Job Listings';

            return response()->json([
                'html' => $html,
                'heading' => $heading,
                'search' => $search ?? null,
            ]);
        }

        return view('pages.homepage', [
            'jobs' => $jobs,
            'search' => $search ?? null,
        ]);
    }

    public function show(Job $job)
    {
        // Only show approved listings to the public, unless the viewer is the owner or an admin
        if ($job->status !== Job::STATUS_APPROVED) {
            if (!auth()->check() || (auth()->id() !== $job->user_id && !auth()->user()->is_admin)) {
                abort(404);
            }
        }

        return view('pages.joblisting', [
            'job' => $job->load('user', 'category'),
        ]);
    }

    public function create()
    {
        return view('pages.create-job');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => ['required', 'string', 'min:3', 'max:255'],
            'company_name' => ['nullable', 'string', 'max:255'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'salary'      => ['required', 'numeric', 'min:100'],
            'description' => ['required', 'string'],
            'location'    => ['nullable', 'string', 'max:255'],
        ]);

        $job = $request->user()->jobs()->create([
            'title'       => $validated['title'],
            'company_name' => $validated['company_name'] ?? null,
            'category_id' => $validated['category_id'] ?? null,
            'salary'      => $validated['salary'],
            'description' => trim($validated['description']),
            'location'    => $validated['location'] ?? null,
        ]);

        return redirect('/jobs/' . $job->id)
            ->with('success', 'Job created successfully!');
    }

    public function edit(Job $job)
    {
        Gate::authorize('modify', $job);

        return view('pages.edit-job', [
            'job' => $job,
        ]);
    }

    public function update(Request $request, Job $job)
    {
        Gate::authorize('modify', $job);

        $validated = $request->validate([
            'title'       => ['required', 'string', 'min:3', 'max:255'],
            'company_name' => ['nullable', 'string', 'max:255'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'salary'      => ['required', 'numeric', 'min:100'],
            'description' => ['required', 'string'],
            'location'    => ['nullable', 'string', 'max:255'],
        ]);

        $job->update([
            'title'       => $validated['title'],
            'company_name' => $validated['company_name'] ?? null,
            'category_id' => $validated['category_id'] ?? null,
            'salary'      => $validated['salary'],
            'description' => trim($validated['description']),
            'location'    => $validated['location'] ?? null,
        ]);

        return redirect('/jobs/' . $job->id)
            ->with('success', 'Job updated successfully!');
    }

    public function destroy(Job $job)
    {
        Gate::authorize('modify', $job);

        $job->delete();

        return redirect('/jobs');
    }
}
