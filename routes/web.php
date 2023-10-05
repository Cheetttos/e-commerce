<?php

use App\Http\Controllers\ApiEcommerceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {return view('e-commerce.index');})->name("index");

Route::get('/product-list/{category_id?}', [SiteController::class, 'product_list'])->name("product-list");
Route::get('/productByCat', [SiteController::class, 'productsByCategory'])->name("productsByCategory");
Route::get('/contact', [SiteController::class, 'contact'])->name("contact");
Route::post('/contact', [SiteController::class, 'contact'])->name("contact_post");
Route::get('/product-detail/{id}', [SiteController::class, 'detail'])->name("details");
Route::post('/product-detail/{id}', [SiteController::class, 'review'])->name("review_post");

Route::get('/adminproducts',[SiteController::class, 'admin_products'])->name("admin_products");
Route::get('/adminemployees',[SiteController::class, 'admin_employees'])->name("admin_employees");

Route::get('/products-table/{category_id?}', [SiteController::class, 'products_table'])->name("product_table");

//Examen 2do
Route::get('/orders-table', [SiteController::class, 'orders_table'])->name("order_table");

Route::get('/users', [SiteController::class, 'users'])->name("users");
Route::post('/users-add', [ApiEcommerceController::class, 'insert_user'])->name("insert_user");

