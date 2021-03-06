<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\ImageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// list published products with images
Route::get('products', [ProductController::class, 'index']);

// list all products with images
Route::get('productsall', [ProductController::class, 'productsAll']);

// list products only
Route::get('productsonly', [ProductController::class, 'productsOnly']);

// Get single product
Route::get('product/{id}', [ProductController::class, 'show']);

// CREATE new product
Route::post('product', [ProductController::class, 'store']);

// UPDATE product
Route::post('productupdate', [ProductController::class, 'update']);

// DELETE product
Route::delete('product/{id}', [ProductController::class, 'destroy']);

// list Statuses
Route::get('statuses', [StatusController::class, 'index']);

// list Images
Route::get('images', [ImageController::class, 'index']);