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
        $jobs = Job::with(['user', 'category'])
            ->latest()
            ->paginate($request->integer('per_page', 10));

        return $this->respondWithCollection(new JobCollection($jobs));
    }

    public function show(Job $job): JsonResponse
    {
        $job->load(['user', 'category']);

        return $this->respondWithResource(new JobResource($job));
    }

    public function store(StoreJobRequest $request): JsonResponse
    {
        $job = $request->user()->jobs()->create($request->validated());
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
}
