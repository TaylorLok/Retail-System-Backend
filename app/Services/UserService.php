<?php

namespace App\Services;


use App\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\DeleteUserRequest;
use App\Http\Requests\User\UpdateUserRequest;

class UserService implements UserRepository
{

    public function __construct(protected UserRepository $userRepository)
    {
    }

    public function getAllUsers(): Collection
    {
        return $this->userRepository->getAllUsers();
    }

    public function getUserById($id): ?User
    {
        return $this->userRepository->getUserById($id);
    }

    public function createUser(CreateUserRequest $request): User
    {
        return $this->userRepository->createUser($request);
    }

    public function updateUser($id,  UpdateUserRequest $request): ?User
    {
        return $this->userRepository->updateUser($id, $request);
    }

    public function deleteUser($id, DeleteUserRequest $request): bool
    {
        return $this->userRepository->deleteUser($id, $request);
    }
}
