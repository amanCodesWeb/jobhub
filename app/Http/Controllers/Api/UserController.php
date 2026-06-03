<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\JobCollection;
use App\Http\Resources\JobResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends ApiController
{
    public function stats(Request $request): JsonResponse
    {
        $user = $request->user();
        $jobs = $user->jobs();

        $latest = (clone $jobs)->with('category')->latest()->first();
        $oldest = (clone $jobs)->oldest()->first();

        return $this->respondWithResource([
            'total_listings'   => $jobs->count(),
            'posted_this_week' => (clone $jobs)->where('created_at', '>=', now()->subWeek())->count(),
            'latest_listing'   => $latest ? new JobResource($latest) : null,
            'oldest_listing'   => $oldest ? new JobResource($oldest) : null,
        ]);
    }

    public function myJobs(Request $request): JsonResponse
    {
        $jobs = $request->user()
            ->jobs()
            ->with('category')
            ->latest()
            ->paginate($request->integer('per_page', 10));

        return $this->respondWithCollection(new JobCollection($jobs));
    }
}
