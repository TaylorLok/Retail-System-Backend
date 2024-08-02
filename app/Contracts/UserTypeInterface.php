<?

namespace App\Contracts;

use App\Http\Requests\User\CreateUserTypeRequest;
use App\Http\Requests\User\DeleteUserTypeRequest;
use App\Http\Requests\User\UpdateUserTypeRequest;
use Illuminate\Database\Eloquent\Collection;
use App\Models\UserType;

interface UserTypeInterface
{
    public function getAllUserTypes(): Collection;
    public function getUserTypeById(int $id): ?UserType;
    public function getUserTypeByTitle(string $title): ?UserType;
    public function createUserType(CreateUserTypeRequest $request): UserType;
    public function updateUserType(int $id, UpdateUserTypeRequest $request): ?UserType;
    public function deleteUserType(int $id, DeleteUserTypeRequest $request): bool;
}
