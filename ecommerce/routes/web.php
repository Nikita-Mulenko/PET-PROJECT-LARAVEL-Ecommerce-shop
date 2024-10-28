<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/redirect', [HomeController::class, 'redirect']);

route::get('/', [HomeController::class, 'index']);

route::get('/product', [AdminController::class, 'product']);

route::get('/showProduct', [AdminController::class, 'showProduct']);

route::post('/uploadProduct', [AdminController::class, 'uploadProduct']);

route::get('/deleteProduct/{id}', [AdminController::class, 'deleteProduct']);

route::get('/updateView/{id}', [AdminController::class, 'updateView']);

route::post('/updateProduct/{id}', [AdminController::class, 'updateProduct']);

route::get('/search', [HomeController::class, 'search']);

route::post('/addToCart/{id}', [HomeController::class, 'addToCart']);

route::get('/showCart', [HomeController::class, 'showCart']);

route::get('/delete/{id}', [HomeController::class, 'deleteCart']);

route::post('/order', [HomeController::class, 'confirmOrder']);

route::get('/showOrder', [AdminController::class, 'showOrder']);

route::get('/updateStatus/{id}', [AdminController::class, 'updateStatus']);

