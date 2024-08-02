<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = ['name', 'price', 'description','stock', 'sku','category_id'];

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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
