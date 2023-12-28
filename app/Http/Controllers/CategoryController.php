<?php

namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;

class CategoryController extends Controller
{
    public function index(){

        $categories = Category::orderBy('created_at', 'desc')->get();

        return response()->json(CategoryResource::collection($categories));
    }

    public function show(string $id){

        $category = Category::find($id);

        if(!$category){
            return response()->json(['message' => 'Category Not Found'], 404);
        }
        return response()->json(new CategoryResource($category));
    }


    public function store(CategoryStoreRequest $request){

        $category = Category::create($request->safe()->all());

        return response()->json(['message' => 'Category added successfully', "category" => new CategoryResource($category)], 201);
    }

    public function update(CategoryUpdateRequest $request , string $id){
        $category = Category::find($id);

        if(!$category){
            return response()->json(['message' => 'Category Not Found'], 404);
        }

        $category->update($request->safe()->all());

        return response()->json(['message' => 'Category updated successfully', "category" => new CategoryResource($category)], 200);

    }
    public function delete(string $id){
        $category = Category::find($id);

        if(!$category){
            return response()->json(['message' => 'Category Not Found'], 404);
        }

        $category->delete();

        return response()->json(['message' => 'Category Deleted successfully'], 200);
    }
}
