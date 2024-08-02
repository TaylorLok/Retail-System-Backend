<?php

namespace App\Repositories;

use App\Contracts\UserTypeInterface;
use App\Http\Requests\User\CreateUserTypeRequest;
use App\Http\Requests\User\DeleteUserTypeRequest;
use App\Http\Requests\User\UpdateUserTypeRequest;
use App\Models\UserType;
use Illuminate\Database\Eloquent\Collection;

class UserTypeRepository implements UserTypeInterface
{
    public function getAllUserTypes(): Collection
    {
        return UserType::all();
    }

    public function getUserTypeById(int $id): ?UserType
    {
        return UserType::findOrFail($id);
    }

    public function getUserTypeByTitle(string $title): ?UserType
    {
        return UserType::where('title', $title)->first();
    }

    public function createUserType(CreateUserTypeRequest $request): UserType
    {
        return UserType::create($request->validated());
    }

    public function updateUserType(int $id, UpdateUserTypeRequest $request): ?UserType
    {
        $userType = UserType::findOrFail($id);
        $userType->update($request->validated());
        return $userType;
    }

    public function deleteUserType(int $id, DeleteUserTypeRequest $request): bool
    {
        $userType = UserType::findOrFail($id);
        return $userType->delete();
    }
}
