<?php

namespace App\Http\Controllers\Admin;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('user', 'category')->latest()->paginate(20);

        return view('admin.jobs.index', [
            'jobs' => $jobs,
        ]);
    }

    public function edit(Job $job)
    {
        return view('admin.jobs.edit', [
            'job' => $job,
        ]);
    }

    public function update(Request $request, Job $job)
    {
        $validated = $request->validate([
            'title'       => ['required', 'string', 'min:3', 'max:255'],
            'company_name' => ['nullable', 'string', 'max:255'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'salary'      => ['required', 'numeric', 'min:100'],
            'description' => ['required', 'string'],
            // 'user_id'  => ['sometimes', 'exists:users,id'], // REMOVED — prevents admin from reassigning job ownership
        ]);

        $job->update($validated);

        return redirect()->route('admin.jobs.index')
            ->with('success', "Job #{$job->id} updated successfully.");
    }

    public function destroy(Job $job)
    {
        $job->delete();

        return redirect()->route('admin.jobs.index')
            ->with('success', "Job #{$job->id} deleted.");
    }
}
