<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $products = Product::factory()
        ->count(5)
        ->for(Category::factory()->create())
        ->create();

        $response = $this->get('/api/products');

        $response->assertStatus(200)
            ->assertJson($products->toArray());
    }

    public function testShow()
    {
        $product = Product::factory()
        ->for(Category::factory()->create())
        ->create();

        $response = $this->get("/api/product/{$product->id}");

        $response->assertStatus(200)
            ->assertJson($product->toArray());
    }

    public function testShowProductNotFound()
    {
        $response = $this->get('/api/product/999a');

        $response->assertStatus(404)
            ->assertJson(['message' => 'Product Not Found']);
    }

    public function testStore()
    {
        $category = Category::factory()->create();

        $data = [
            'name' => 'Test Product',
            'price' => 10.99,
            'description' => 'This is a test product.',
            'stock' => 100,
            'category_id' => $category->id,
        ];

        $response = $this->post('/api/create/product', $data);

        $response->assertStatus(201)
            ->assertJson(['message' => 'Product added successfully']);
    }

    public function testUpdate()
    {
        $product = Product::factory()
        ->for(Category::factory()->create())
        ->create();

        $category = Category::factory()->create();

        $data = [
            'name' => 'Updated Product',
            'price' => 19.99,
            'description' => 'This is an updated product.',
            'stock' => 50,
            'category_id' => $category->id,
        ];

        $response = $this->put("/api/product/{$product->id}/edit", $data);

        $response->assertStatus(200)
            ->assertJson(['message' => 'Product updated successfully']);
    }

    public function testUpdateProductNotFound()
    {
        $response = $this->put('/api/product/999a/edit', []);

        $response->assertStatus(404)
            ->assertJson(['message' => 'Product Not Found']);
    }

    public function testDelete()
    {
        $product = Product::factory()
        ->for(Category::factory()->create())
        ->create();

        $response = $this->delete("/api/delete/product/{$product->id}");

        $response->assertStatus(200)
            ->assertJson(['message' => 'Deleted successfully']);
    }

    public function testDeleteProductNotFound()
    {
        $response = $this->delete('/api/delete/product/999a');

        $response->assertStatus(404)
            ->assertJson(['message' => 'Product Not Found']);
    }
}
