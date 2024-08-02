<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\CreateUserTypeRequest;
use App\Http\Requests\User\UpdateUserTypeRequest;
use App\Http\Requests\User\DeleteUserTypeRequest;
use App\Services\UserTypeService;
use Illuminate\Http\JsonResponse;

class UserTypeController extends Controller
{
    public function __construct(protected UserTypeService $userTypeService)
    {
    }

    public function index(): JsonResponse
    {
        return response()->json($this->userTypeService->getAllUserTypes());
    }

    public function show(int $id): JsonResponse
    {
        return response()->json($this->userTypeService->getUserTypeById($id));
    }

    public function store(CreateUserTypeRequest $request): JsonResponse
    {
        return response()->json($this->userTypeService->createUserType($request));
    }

    public function update(UpdateUserTypeRequest $request, int $id): JsonResponse
    {
        return response()->json($this->userTypeService->updateUserType($id, $request));
    }

    public function destroy(DeleteUserTypeRequest $request, int $id): JsonResponse
    {
        return response()->json($this->userTypeService->deleteUserType($id, $request));
    }
}
