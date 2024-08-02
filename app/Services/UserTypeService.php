<?php

namespace App\Services;

use App\Contracts\UserTypeInterface;
use App\Http\Requests\User\CreateUserTypeRequest;
use App\Http\Requests\User\DeleteUserTypeRequest;
use App\Http\Requests\User\UpdateUserTypeRequest;
use App\Models\UserType;
use Illuminate\Database\Eloquent\Collection;

class UserTypeService
{

    public function __construct(protected UserTypeInterface $userTypeRepository)
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
