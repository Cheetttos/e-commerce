<?php

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


Route::get('/', function () {
    return view('e-commerce.index');
});

Route::get('/product-list/{category_id?}', [SiteController::class, 'product_list']);


/*
Route::get('/greeting', function () {
    return 'Hello World';
});

Route::get('/', [SiteController::class, 'index']);
Route::get('/services', [SiteController::class, 'services']);
Route::get('/contact',[SiteController::class, 'contact']);
Route::get('/product',[SiteController::class, 'product']);*/
/*Route::get('/faq',[SiteController::class, 'faq']);*/