<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//
// use App\Models\Product;
//
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

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

// Route::get('/products', function() {
//     return Product::all();
// });

//Route::get('products', [ProductController::class, 'index']);

// Route::post('/products', function() {
//     return Product::create([
//         'name' => 'Chair',
//         'slug' => 'product-one',
//         'description' => 'This is a comfortable chair',
//         'price' => '99.99'
//     ]);
// });

//Route::post('products', [ProductController::class, 'store']);

// Public routes
// Route::resource('products', ProductController::class);
Route::get('products/search/{name}', [ProductController::class, 'search']);
Route::get('products', [ProductController::class, 'index']);
Route::get('products/{id}', [ProductController::class, 'show']);
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Protected routes
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post('products', [ProductController::class, 'store']);
    Route::put('products/{id}', [ProductController::class, 'update']);
    Route::delete('products/{id}', [ProductController::class, 'destroy']);
    Route::post('logout', [AuthController::class, 'logout']);
});
