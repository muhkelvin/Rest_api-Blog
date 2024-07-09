<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CategorySingleResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function index()
    {
        return CategoryResource::collection(Category::get());
    }


    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);
            $category = Category::create([
                'name' => $request->name,
                'slug' => strtolower(Str::slug($request->name . '-'. Str::random(5))),
            ]);

            return response()->json([
                'message' => 'Category created successfully',
                'category' => new CategorySingleResource($category),
            ], 201);
        }catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create category',
                'error' => $e->getMessage(),
            ], 400);
        }
    }


    public function show(Category $category)
    {
        return new CategorySingleResource($category);
    }


    public function update(Request $request, Category $category)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);
            $category->update([
                'name' => $request->name,
                'slug' => strtolower(Str::slug($request->name . '-'. Str::random(5))),
            ]);

            return response()->json([
                'message' => 'Category Update successfully',
                'category' => new CategorySingleResource($category),
            ], 201);
        }catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update category',
                'error' => $e->getMessage(),
            ], 400);
        }
    }


    public function destroy(Category $category)
    {
        try {
            $category->delete();

            return response()->json([
                'message' => 'Post deleted successfully',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete post',
                'error' => $e->getMessage(),
            ], 400);
        }
    }
}
