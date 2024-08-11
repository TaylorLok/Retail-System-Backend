<?

namespace App\Contracts;

use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Requests\Category\DeleteCategoryRequest;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Category;

interface CategoryInterface
{
    public function getAllCategories(): Collection;
    public function getCategoryById(int $id): ?Category;
    public function getCategoryByName(string $name): ?Category;
    public function createCategory(CreateCategoryRequest $request): Category;
    public function updateCategory(int $id, UpdateCategoryRequest $request): ?Category;
    public function deleteCategory(int $id, DeleteCategoryRequest $request): bool;
}
