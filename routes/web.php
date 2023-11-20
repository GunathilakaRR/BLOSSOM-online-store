<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StripePaymentController;


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




// Route::post('stripe/payment', [HomeController::class, 'payment'])->name('stripe');
// Route::get('stripe/success', [StripePaymentController::class, 'success'])->name('stripe_success');
// Route::get('stripe/cancel', [StripePaymentController::class, 'cancel'])->name('stripe_cancel');


// Route::post('cash-payment', [HomeController::class, 'payment'])->name('cash-payment');

Route::post('/process-payment', [HomeController::class, 'processPayment'])->name('process.payment');
Route::get('/paymentSuccess', [HomeController::class, 'paymentSuccess'])->name('paymentSuccess');
// Route::post('/cash-payment-interface', [HomeController::class, 'updateOrdersForCashPayment'])->name('cash-payment-interface');
