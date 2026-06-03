<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('user')->paginate(5);

        return view('pages.homepage', [
            'jobs' => $jobs,
        ]);
    }

    public function show(Job $job)
    {
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
        ]);

        $job = $request->user()->jobs()->create([
            'title'       => $validated['title'],
            'company_name' => $validated['company_name'] ?? null,
            'category_id' => $validated['category_id'] ?? null,
            'salary'      => $validated['salary'],
            'description' => trim($validated['description']),
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
        ]);

        $job->update([
            'title'       => $validated['title'],
            'company_name' => $validated['company_name'] ?? null,
            'category_id' => $validated['category_id'] ?? null,
            'salary'      => $validated['salary'],
            'description' => trim($validated['description']),
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
