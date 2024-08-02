<?php

namespace App\Repositories;

use App\Models\User;
use App\Contracts\UserInterface;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\DeleteUserRequest;
use App\Http\Requests\User\UpdateUserRequest;

class UserRepository implements UserInterface
{
    public function getAllUsers(): Collection
    {
        return User::all();
    }

    public function getUserById($id): ?User
    {
        return User::findOrFail($id);
    }

    public function createUser(CreateUserRequest $request): User
    {
        return User::create($request->validated());
    }

    public function updateUser($id, UpdateUserRequest $request): ?User
    {
        $user = User::findOrFail($id);
        $user->update($request->validated());
        return $user;
    }

    public function deleteUser($id, DeleteUserRequest $request): bool
    {
        $user = User::findOrFail($id);

        return $user->delete();
    }
}
