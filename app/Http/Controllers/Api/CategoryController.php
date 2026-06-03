<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryController extends ApiController
{
    public function index(): JsonResponse
    {
        $categories = Category::withCount('jobs')->orderBy('name')->get();

        return $this->respondWithResource(CategoryResource::collection($categories));
    }

    public function show(Category $category): JsonResponse
    {
        $category->loadCount('jobs');

        return $this->respondWithResource(new CategoryResource($category));
    }
}
