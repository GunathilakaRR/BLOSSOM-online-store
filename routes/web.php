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
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/redirect', [HomeController::class, 'redirect']);

Route::get('/', [HomeController::class, 'index']);

Route::get('/product', [AdminController::class, 'product']);

Route::post('/uploadproduct', [AdminController::class, 'uploadproduct']);

Route::get('/showproduct', [AdminController::class, 'showproduct']);

Route::get('/deleteproduct/{id}', [AdminController::class, 'deleteproduct']);

Route::get('/deletecategory/{id}', [AdminController::class, 'deletecategory']);

Route::get('/updateproduct/{id}', [AdminController::class, 'updateproduct']);

Route::post('/modifyproduct/{id}', [AdminController::class, 'modifyproduct']);

Route::post('/addToCart/{id}', [HomeController::class, 'addToCart']);

Route::get('/showcart', [HomeController::class, 'showcart']);

Route::get('/deleteAddToCart/{id}', [HomeController::class, 'deleteAddToCart']);

Route::get('/search', [HomeController::class, 'search']);

