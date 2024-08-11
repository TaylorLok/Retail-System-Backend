<?php

namespace App\Repositories;

use App\Contracts\CategoryInterface;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Requests\Category\DeleteCategoryRequest;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository implements CategoryInterface
{
    public function getAllCategories(): Collection
    {
        return Category::all();
    }

    public function getCategoryById(int $id): ?Category
    {
        return Category::findOrFail($id);
    }

    public function getCategoryByName(string $name): ?Category
    {
        return Category::findOrFail($name);
    }

    public function createCategory(CreateCategoryRequest $request): Category
    {
        return Category::create($request->validated());
    }

    public function updateCategory(int $id, UpdateCategoryRequest $request): ?Category
    {
        $category = Category::findOrFail($id);
        $category->update($request->validated());
        return $category;
    }

    public function deleteCategory(int $id, DeleteCategoryRequest $request): bool
    {
        $category = Category::findOrFail($id);
        return $category->delete();
    }
}
