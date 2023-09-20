<?php

use App\Http\Controllers\ApiEcommerceController;
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

Route::get('/products', [ApiEcommerceController::class, 'products'])->name("ApiProducts");
Route::get('/categories', [ApiEcommerceController::class, 'categories'])->name("api_categories");

Route::get('/products/{category_id?}', [ApiEcommerceController::class, 'products'])->name("products");
Route::get('/products-table/{category_id?}', function () {
    return view('e-commerce.products-api');
});
Route::get('/categories', [ApiEcommerceController::class, 'categories'])->name("api_categories");