<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        // Assuming you have some categories in the database
        Category::factory()->count(5)->create();

        $response = $this->get('/api/categories');

        $response->assertStatus(200);
    }

    public function testShow()
    {
        $category = Category::factory()->create();

        $response = $this->get("/api/category/{$category->id}");

        $response->assertStatus(200)
            ->assertJson($category->toArray());
    }

    public function testShowCategoryNotFound()
    {
        $response = $this->get('/api/category/999a');

        $response->assertStatus(404)
            ->assertJson(['message' => 'Category Not Found']);
    }

    public function testStore()
    {
        $data = [
            'name' => 'Test Category',
            'description' => 'This is a test category.',
        ];

        $response = $this->post('/api/create/category', $data);

        $response->assertStatus(201)
            ->assertJson(['message' => 'Category added successfully']);
    }

    public function testUpdate()
    {
        $category = Category::factory()->create();

        $data = [
            'name' => 'Updated Category',
            'description' => 'This is an updated category.',
        ];

        $response = $this->put("/api/category/{$category->id}/edit", $data);

        $response->assertStatus(200)
            ->assertJson(['message' => 'Category updated successfully']);
    }

    public function testUpdateCategoryNotFound()
    {
        $data = [
            'name' => 'Updated Category',
            'description' => 'This is an updated category.',
        ];
        $response = $this->put('/api/category/999a/edit', $data);

        $response->assertStatus(404)
            ->assertJson(['message' => 'Category Not Found']);
    }

    public function testDelete()
    {
        $category = Category::factory()->create();

        $response = $this->delete("/api/delete/category/{$category->id}");

        $response->assertStatus(200)
            ->assertJson(['message' => 'Category Deleted successfully']);
    }

    public function testDeleteCategoryNotFound()
    {
        $response = $this->delete('/api/delete/category/999a');

        $response->assertStatus(404)
            ->assertJson(['message' => 'Category Not Found']);
    }
}
