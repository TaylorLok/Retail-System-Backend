<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Http\Resources\CategoryResource;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\DeleteCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;

class CategoryController extends Controller
{

    public function __construct(protected CategoryService $categoryService) {}

    public function index()
    {
        $categories = $this->categoryService->getAllCategories();

        return response()->json(CategoryResource::collection($categories));
    }

    public function show(string $id)
    {
        $category = $this->categoryService->getCategoryById($id);

        if (!$category) {
            return response()->json(['message' => 'Category Not Found'], 404);
        }
        return response()->json(new CategoryResource($category));
    }

    public function store(CreateCategoryRequest $request)
    {
        $category = $this->categoryService->createCategory($request);

        return response()->json(['message' => 'Category added successfully', "category" => new CategoryResource($category)], 201);
    }

    public function update(UpdateCategoryRequest $request, int $id)
    {
        $category = $this->categoryService->updateCategory($id, $request);

        if (!$category) {
            return response()->json(['message' => 'Category Not Found'], 404);
        }

        return response()->json(['message' => 'Category updated successfully', "category" => new CategoryResource($category)], 200);
    }

    public function searchByName(Request $request)
    {
        $name = $request->input('name');

        $category = $this->categoryService->getCategoryByName($name);

        if (!$category) {
            return response()->json(['message' => 'Category Not Found'], 404);
        }

        return response()->json(['message' => 'Category name is: ', "category" => new CategoryResource($category)], 200);
    }

    public function delete(int $id, DeleteCategoryRequest $request)
    {
        $category = $this->categoryService->deleteCategory($id, $request);

        if (!$category) {
            return response()->json(['message' => 'Category Not Found'], 404);
        }

        return response()->json(['message' => 'Category Deleted successfully'], 200);
    }
}
