<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/products', [App\Http\Controllers\ProductController::class, 'index']);
Route::get('product/{id}', [App\Http\Controllers\ProductController::class, 'show']);
Route::post('/create/product', [App\Http\Controllers\ProductController::class, 'store']);
Route::put('/product/{id}/edit', [App\Http\Controllers\ProductController::class, 'update']);
Route::delete('/delete/product/{id}', [App\Http\Controllers\ProductController::class, 'delete']);


