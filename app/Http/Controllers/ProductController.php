<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //returning all product in json format for api order by desc
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();

        return response()->json($products, 200);
    }

    //returning a single product in json format for api
    public function show($id)
    {
        $product = Product::find($id);
        if(is_null($product)){
            return response()->json(['message' => 'Product Not Found'], 404);
        }
        return response()->json($product::find($id), 200);
    }

    //creating a new product
    public function store(Request $request)
    {
        try
        {
            $request->validate([
                'name' => 'required',
                'price' => 'required|numeric',
                'description' => 'required',
                'stock' => 'required|numeric',
            ], [
                'name.required' => 'The name field is required.',
                'price.required' => 'The price field is required.',
                'price.numeric' => 'The price must be a numeric value.',
                'description.required' => 'The description field is required.',
                'stock.required' => 'The stock field is required.',
                'stock.numeric' => 'The stock must be a numeric value.',
            ]);

            $product = Product::create($request->all());

            return response()->json(['message' => 'Product added successfully', 'product' => $product], 201);

        }
        catch (\Illuminate\Validation\ValidationException $e)
        {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }


    //updating a product
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if(is_null($product)){
            return response()->json(['message' => 'Product Not Found'], 404);
        }

        try
        {
            $request->validate([
                'name' => 'required',
                'price' => 'required|numeric',
                'description' => 'required',
                'stock' => 'required|numeric',
            ], [
                'name.required' => 'The name field is required.',
                'price.required' => 'The price field is required.',
                'price.numeric' => 'The price must be a numeric value.',
                'description.required' => 'The description field is required.',
                'stock.required' => 'The stock field is required.',
                'stock.numeric' => 'The stock must be a numeric value.',
            ]);

            $product->update($request->all());

            return response()->json(['message' => 'Product updated successfully', 'product' => $product], 200);
        }
        catch (\Illuminate\Validation\ValidationException $e)
        {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    //deleting a product
    public function delete(Request $request, $id)
    {
        $product = Product::find($id);
        if(is_null($product)){
            return response()->json(['message' => 'Product Not Found'], 404);
        }
        $product->delete();

        return response()->json(['message' => 'Deleted successfully'], 200);
    }
}
