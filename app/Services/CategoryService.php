<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Requests\Category\DeleteCategoryRequest;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{

    public function __construct(protected CategoryRepository $categoryRepository)
    {
    }

    public function getAllCategories(): Collection
    {
        return $this->categoryRepository->getAllCategories()->sortByDesc('created_at');
    }

    public function getCategoryById(int $id): ?Category
    {
        return $this->categoryRepository->getCategoryById($id);
    }

    public function getCategoryByName(string $name)
    {
        return $this->categoryRepository->getCategoryByName($name);
    }

    public function createCategory(CreateCategoryRequest $request): ?Category
    {
        return $this->categoryRepository->createCategory($request);
    }

    public function updateCategory(int $id, UpdateCategoryRequest $request): ?Category
    {
        return $this->categoryRepository->updateCategory($id, $request);
    }

    public function deleteCategory(int $id, DeleteCategoryRequest $request): bool
    {
        return $this->categoryRepository->deleteCategory($id, $request);
    }
}
