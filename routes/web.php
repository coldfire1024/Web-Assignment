<?php

use Illuminate\Support\Facades\Route;

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

// Home Page
Route::get('/', [App\Http\Controllers\MenuController::class, 'index'])->name('home');

// About Us
Route::get('/about', [App\Http\Controllers\MenuController::class, 'about'])->name('about');

// Food Detail Page
Route::get('/menu/{food_id}', [App\Http\Controllers\MenuController::class, 'detail'])->name('detail');

// Filtering Page
Route::get('/mainCourse', [App\Http\Controllers\MenuController::class, 'mainCourse'])->name('mainCourse');
Route::get('/beverages', [App\Http\Controllers\MenuController::class, 'beverages'])->name('beverages');
Route::get('/desserts', [App\Http\Controllers\MenuController::class, 'desserts'])->name('desserts');

// Searching Page
Route::get('/search', [App\Http\Controllers\MenuController::class, 'search'])->name('search');
Route::post('/search', [App\Http\Controllers\MenuController::class, 'result'])->name('result');

// Login Page
Route::get('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'authenticateUser'])->name('authenticateUser');

// Register Page
Route::get('/register', [App\Http\Controllers\AuthController::class, 'register'])->name('register');
Route::post('/register', [App\Http\Controllers\UserController::class, 'createUser'])->name('createUser');

// Log Out Page
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'deauthenticateUser'])->name('deauthenticateUser');

// Member Pages
Route::middleware(['auth'])->group(function () {
    // Profile Page
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    Route::patch('/profile', [App\Http\Controllers\UserController::class, 'updateUser'])->name('updateUser');

    // Cart Page
    Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
    Route::post('/cart', [App\Http\Controllers\CartController::class, 'addToCart'])->name('addToCart');
    Route::patch('/cart/{cartItemId}/inc', [App\Http\Controllers\CartController::class, 'increaseQuantity'])->name('increaseQuantity');
    Route::patch('/cart/{cartItemId}/dec', [App\Http\Controllers\CartController::class, 'decreaseQuantity'])->name('decreaseQuantity');
    Route::delete('/cart/{cartItemId}', [App\Http\Controllers\CartController::class, 'deleteFromCart'])->name('deleteFromCart');

    // Checkout Page (Cart checkout view)
    Route::get('/cart/checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('cart.checkout');
    Route::post('/cart/checkout', [App\Http\Controllers\TransactionController::class, 'checkoutOrder'])->name('checkoutOrder');

    // Payment Page (Stripe Checkout view)
    Route::get('/checkout', [App\Http\Controllers\PaymentController::class, 'showCheckoutForm'])->name('checkout.form');
    Route::post('/process-payment', [App\Http\Controllers\PaymentController::class, 'processPayment'])->name('process.payment');

    // Transaction History Page
    Route::get('/transactions', [App\Http\Controllers\TransactionController::class, 'index'])->name('transactions');
});

// Add Menu Page
Route::middleware(['auth.role:admin'])->group(function () {
    Route::post('/add', [App\Http\Controllers\MenuController::class, 'addMenu'])->name('addMenu');
    Route::get('/add', [App\Http\Controllers\MenuController::class, 'returnAddMenu'])->name('returnAddMenu');

    // Update
    Route::get('/update', [App\Http\Controllers\MenuController::class, 'updatePage'])->name('updatePage');
    Route::put('/update', [App\Http\Controllers\MenuController::class, 'updateMenu'])->name('updateMenu');

    // Delete
    Route::delete('/delete', [App\Http\Controllers\MenuController::class, 'deleteMenu'])->name('deleteMenu');

    // Manage Food Page
    // General
    Route::get('/manage', [App\Http\Controllers\MenuController::class, 'returnManageMenu'])->name('returnManageMenu');
    Route::get('/searchM', [App\Http\Controllers\MenuController::class, 'searchM'])->name('searchM');
    Route::post('/searchM', [App\Http\Controllers\MenuController::class, 'resultM'])->name('resultM');
});
