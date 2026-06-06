<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\StoreJobRequest;
use App\Http\Requests\Api\UpdateJobRequest;
use App\Http\Resources\JobCollection;
use App\Http\Resources\JobResource;
use App\Models\Job;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class JobController extends ApiController
{
    public function index(Request $request): JsonResponse
    {
        $query = Job::with(['user', 'category']);

        // Public scope: only approved, unless user is admin or owner filtering own
        $user = $request->user();

        if ($user && $user->isAdmin()) {
            // Admins see everything
        } elseif ($user && $request->filled('status') && $request->query('status') !== 'all') {
            // Owner can filter by their own status — check for owner scope below
            $query->where(function ($q) use ($user) {
                $q->where('status', Job::STATUS_APPROVED)
                  ->orWhere('user_id', $user->id);
            });
        } else {
            $query->approved();
        }

        // ── Filters ──────────────────────────────────────────────
        if ($search = $request->query('search')) {
            $search = trim($search);
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('company_name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
            });
        }

        if ($categoryId = $request->query('category_id')) {
            $query->where('category_id', $categoryId);
        }

        if ($location = $request->query('location')) {
            $query->where('location', 'like', "%{$location}%");
        }

        if ($minSalary = $request->query('salary_min')) {
            $query->where('salary', '>=', (int) $minSalary);
        }

        if ($maxSalary = $request->query('salary_max')) {
            $query->where('salary', '<=', (int) $maxSalary);
        }

        // Only allow status filter for admins or owners
        if ($request->filled('status') && $request->query('status') !== 'all') {
            $status = $request->query('status');
            if (in_array($status, [Job::STATUS_PENDING, Job::STATUS_APPROVED, Job::STATUS_REJECTED])) {
                if ($user && ($user->isAdmin() || $request->query('my'))) {
                    $query->where('status', $status);
                }
            }
        }

        if ($request->boolean('my') && $user) {
            $query->where('user_id', $user->id);
        }

        $jobs = $query->latest()->paginate($request->integer('per_page', 10));

        return $this->respondWithCollection(new JobCollection($jobs));
    }

    public function show(Request $request, Job $job): JsonResponse
    {
        // Only show approved to public, unless owner or admin
        if ($job->status !== Job::STATUS_APPROVED) {
            $user = $request->user();
            if (! $user || ($user->id !== $job->user_id && ! $user->isAdmin())) {
                return $this->respondError('Resource not found.', 404);
            }
        }

        $job->load(['user', 'category']);

        return $this->respondWithResource(new JobResource($job));
    }

    public function store(StoreJobRequest $request): JsonResponse
    {
        $data = $request->validated();

        // Non-admin users' listings require admin approval
        $data['status'] = $request->user()->isAdmin()
            ? Job::STATUS_APPROVED
            : Job::STATUS_PENDING;

        $job = $request->user()->jobs()->create($data);
        $job->load('category');

        return $this->respondWithMutation(
            message: 'Listing created successfully.',
            data:    new JobResource($job),
            code:    201,
        );
    }

    public function update(UpdateJobRequest $request, Job $job): JsonResponse
    {
        // Authorization handled by UpdateJobRequest::authorize()
        $job->update($request->validated());
        $job->load(['user', 'category']);

        return $this->respondWithMutation(
            message: 'Listing updated successfully.',
            data:    new JobResource($job),
        );
    }

    public function destroy(Request $request, Job $job): JsonResponse
    {
        // Authorize: only owner or admin
        $this->authorize('modify', $job);

        $job->delete();

        return $this->respondDeleted();
    }

    // ─── Admin: Approval Workflow ────────────────────────────────

    public function approve(Job $job): JsonResponse
    {
        $job->update(['status' => Job::STATUS_APPROVED]);

        return $this->respondWithMutation(
            message: 'Listing approved successfully.',
            data:    new JobResource($job->load('category')),
        );
    }

    public function reject(Job $job): JsonResponse
    {
        $job->update(['status' => Job::STATUS_REJECTED]);

        return $this->respondWithMutation(
            message: 'Listing rejected.',
            data:    new JobResource($job->load('category')),
        );
    }

    public function pending(Job $job): JsonResponse
    {
        $job->update(['status' => Job::STATUS_PENDING]);

        return $this->respondWithMutation(
            message: 'Listing moved back to pending.',
            data:    new JobResource($job->load('category')),
        );
    }
}
