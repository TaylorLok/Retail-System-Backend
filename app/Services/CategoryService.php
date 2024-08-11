<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Requests\Category\DeleteCategoryRequest;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class UserTypeService
{

    public function __construct(protected CategoryRepository $categoryRepository)
    {
    }

    public function getAllUserTypes(): Collection
    {
        return $this->userTypeRepository->getAllUserTypes();
    }

    public function getUserTypeById(int $id): ?UserType
    {
        return $this->userTypeRepository->getUserTypeById($id);
    }

    public function getUserTypeByTitle(string $title): ?UserType
    {
        return $this->userTypeRepository->getUserTypeByTitle($title);
    }

    public function createUserType(CreateUserTypeRequest $request): UserType
    {
        return $this->userTypeRepository->createUserType($request);
    }

    public function updateUserType(int $id, UpdateUserTypeRequest $request): ?UserType
    {
        return $this->userTypeRepository->updateUserType($id, $request);
    }

    public function deleteUserType(int $id, DeleteUserTypeRequest $request): bool
    {
        return $this->userTypeRepository->deleteUserType($id, $request);
    }
}
