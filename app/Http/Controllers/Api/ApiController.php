<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;

class ApiController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Single resource response.
     */
    protected function respondWithResource(mixed $resource, int $code = 200): JsonResponse
    {
        return response()->json(['data' => $resource], $code);
    }

    /**
     * Paginated collection response with auto-generated meta/links.
     */
    protected function respondWithCollection(mixed $collection, int $code = 200): JsonResponse
    {
        return $collection->response()->setStatusCode($code);
    }

    /**
     * Mutation response (create / update) — message + data.
     */
    protected function respondWithMutation(string $message, mixed $data = null, int $code = 200): JsonResponse
    {
        $payload = ['message' => $message];

        if (! is_null($data)) {
            $payload['data'] = $data;
        }

        return response()->json($payload, $code);
    }

    /**
     * Deletion response — 204 No Content.
     */
    protected function respondDeleted(): JsonResponse
    {
        return response()->json(null, 204);
    }

    /**
     * Simple message-only response (e.g. logout).
     */
    protected function respondMessage(string $message, int $code = 200): JsonResponse
    {
        return response()->json(['message' => $message], $code);
    }

    /**
     * Error response.
     */
    protected function respondError(string $message, int $code = 400): JsonResponse
    {
        return response()->json(['message' => $message], $code);
    }
}
