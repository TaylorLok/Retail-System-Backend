<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Requests\User\DeleteUserRequest;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function __construct(protected UserService $userService)
    {
    }

    public function index(): JsonResponse
    {
        return response()->json($this->userService->getAllUsers());
    }

    public function show(int $id): JsonResponse
    {
        return response()->json($this->userService->getUserById($id));
    }

    public function store(CreateUserRequest $request): JsonResponse
    {
        $data = $request->validated();
        return response()->json($this->userService->createUser($data));
    }

    public function update(UpdateUserRequest $request, int $id): JsonResponse
    {
        $data = $request->validated();
        return response()->json($this->userService->updateUser($id, $data));
    }

    public function destroy(DeleteUserRequest $request, int $id): JsonResponse
    {
        return response()->json($this->userService->deleteUser($id, $request));
    }
}
