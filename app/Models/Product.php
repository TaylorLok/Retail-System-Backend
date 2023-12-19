<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'description','stock', 'sku'];

    protected static function generateUniqueSku()
    {
        $faker = \Faker\Factory::create();

        // Generate a unique SKU with the specified format
        return $faker->unique()->bothify('??-########');
    }

    protected static function boot()
    {
        parent::boot();

        // Registering a creating event listener
        static::creating(function ($product) {
            // Generate a unique SKU with the specified format
            $product->sku = static::generateUniqueSku();
        });
    }

    use HasFactory;
}
