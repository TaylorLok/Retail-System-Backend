<?

namespace App\Contracts;

use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\DeleteUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use Illuminate\Database\Eloquent\Collection;
use App\Models\User;

interface UserInterface
{
    public function getAllUsers(): Collection;
    public function getUserById(int $id): ?User;
    public function createUser(CreateUserRequest $request): User;
    public function updateUser(int $id, UpdateUserRequest $request): ?User;
    public function deleteUser(int $id, DeleteUserRequest $request): bool;
}
