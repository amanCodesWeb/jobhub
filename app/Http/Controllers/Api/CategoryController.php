<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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

    // ─── Admin-only: Category Management ─────────────────────────

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'slug'        => ['required', 'string', 'max:255', 'unique:categories,slug'],
            'description' => ['nullable', 'string', 'max:1000'],
        ]);

        $category = Category::create($validated);

        return $this->respondWithMutation(
            message: 'Category created successfully.',
            data:    new CategoryResource($category),
            code:    201,
        );
    }

    public function update(Request $request, Category $category): JsonResponse
    {
        $validated = $request->validate([
            'name'        => ['sometimes', 'required', 'string', 'max:255'],
            'slug'        => ['sometimes', 'required', 'string', 'max:255', 'unique:categories,slug,' . $category->id],
            'description' => ['nullable', 'string', 'max:1000'],
        ]);

        $category->update($validated);

        return $this->respondWithMutation(
            message: 'Category updated successfully.',
            data:    new CategoryResource($category),
        );
    }

    public function destroy(Category $category): JsonResponse
    {
        if ($category->jobs()->exists()) {
            return $this->respondError(
                'Cannot delete category with existing listings.',
                409,
            );
        }

        $category->delete();

        return $this->respondDeleted();
    }
}
