<?php

namespace App\Http\Controllers\Admin;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status', 'all');

        $query = Job::with('user', 'category');

        if (in_array($status, ['pending', 'approved', 'rejected'])) {
            $query->where('status', $status);
        }

        $jobs = $query->latest()->paginate(20);

        if ($request->ajax()) {
            return view('admin.jobs._table', [
                'jobs'   => $jobs,
                'status' => $status,
            ]);
        }

        return view('admin.jobs.index', [
            'jobs'   => $jobs,
            'status' => $status,
        ]);
    }

    public function trashed(Request $request)
    {
        $jobs = Job::onlyTrashed()
            ->with('user', 'category')
            ->latest('deleted_at')
            ->paginate(20);

        return view('admin.jobs.trashed', [
            'jobs' => $jobs,
        ]);
    }

    public function forceDestroy($id)
    {
        $job = Job::withTrashed()->findOrFail($id);
        $job->forceDelete();

        return redirect()->route('admin.jobs.trashed')
            ->with('success', "Job #{$id} has been permanently deleted.");
    }

    public function forceDeleteAll()
    {
        $count = Job::onlyTrashed()->count();
        Job::onlyTrashed()->forceDelete();

        return redirect()->route('admin.jobs.trashed')
            ->with('success', "All {$count} trashed listings have been permanently deleted.");
    }

    public function forceDeleteOlderThan()
    {
        $cutoff = Carbon::now()->subDays(60);

        $count = Job::onlyTrashed()
            ->where('deleted_at', '<', $cutoff)
            ->count();

        Job::onlyTrashed()
            ->where('deleted_at', '<', $cutoff)
            ->forceDelete();

        return redirect()->route('admin.jobs.trashed')
            ->with('success', "{$count} listings deleted more than 60 days ago have been permanently removed.");
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
            'location'    => ['nullable', 'string', 'max:255'],
            'status'      => ['nullable', 'in:pending,approved,rejected'],
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

    public function approve(Job $job)
    {
        $job->update(['status' => Job::STATUS_APPROVED]);

        return redirect()->route('admin.jobs.index')
            ->with('success', "Job #{$job->id} has been approved and is now visible to the public.");
    }

    public function preview(Job $job)
    {
        $job->load('user', 'category');

        return response()->json([
            'id'          => $job->id,
            'title'       => $job->title,
            'company_name' => $job->company_name,
            'salary'      => number_format($job->salary),
            'location'    => $job->location,
            'description' => $job->description,
            'status'      => $job->status,
            'category'    => $job->category?->name ?? '—',
            'posted_by'   => $job->user->first_name . ' ' . $job->user->last_name,
            'created_at'  => $job->created_at->format('M d, Y'),
            'updated_at'  => $job->updated_at->format('M d, Y'),
        ]);
    }

    public function reject(Job $job)
    {
        $job->update(['status' => Job::STATUS_REJECTED]);

        return redirect()->route('admin.jobs.index')
            ->with('success', "Job #{$job->id} has been rejected.");
    }

    public function pending(Job $job)
    {
        $job->update(['status' => Job::STATUS_PENDING]);

        return redirect()->route('admin.jobs.index')
            ->with('success', "Job #{$job->id} has been moved back to pending.");
    }
}
