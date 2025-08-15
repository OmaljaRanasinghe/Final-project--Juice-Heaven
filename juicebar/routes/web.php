<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomizeJuiceController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RewardsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Employee\OrderController as EmployeeOrderController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\FruitController as AdminFruitController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin routes
Route::middleware(['auth', 'verified', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('products', AdminProductController::class);
    Route::resource('users', AdminUserController::class);
    Route::resource('orders', AdminOrderController::class)->only(['index', 'show', 'update', 'destroy']);
    Route::resource('fruits', AdminFruitController::class);
    
    // Employee management routes
    Route::get('/employees', [AdminUserController::class, 'employeeIndex'])->name('employees.index');
    Route::get('/employees/create', [AdminUserController::class, 'createEmployee'])->name('employees.create');
    Route::post('/employees', [AdminUserController::class, 'storeEmployee'])->name('employees.store');
});

// Employee routes
Route::middleware(['auth', 'verified', 'employee'])->prefix('employee')->name('employee.')->group(function () {
    Route::get('/dashboard', [EmployeeController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [EmployeeController::class, 'profile'])->name('profile');
    Route::get('/orders', [EmployeeOrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [EmployeeOrderController::class, 'show'])->name('orders.show');
    Route::patch('/orders/{order}/status', [EmployeeOrderController::class, 'updateStatus'])->name('orders.updateStatus');
});

Route::get('/product', [ProductController::class, 'index'])->middleware(['auth', 'verified'])->name('product');

Route::get('/favorites', [FavoriteController::class, 'index'])->middleware(['auth', 'verified'])->name('favorites');

Route::get('/rewards', [RewardsController::class, 'index'])->middleware(['auth', 'verified'])->name('rewards');
Route::post('/rewards/redeem', [RewardsController::class, 'redeem'])->middleware(['auth', 'verified'])->name('rewards.redeem');

Route::get('/about', function () {
    return view('about');
})->middleware(['auth', 'verified'])->name('about');

Route::get('/contactus', function () {
    return view('contactus');
})->middleware(['auth', 'verified'])->name('contactus');

Route::get('/cart', [CartController::class, 'index'])->middleware(['auth', 'verified'])->name('cart');

// New simple billing flow
Route::get('/billing', [BillingController::class, 'show'])->middleware(['auth', 'verified'])->name('billing');
Route::post('/billing/process', [BillingController::class, 'process'])->middleware(['auth', 'verified'])->name('billing.process');
Route::post('/payment/process', [PaymentController::class, 'process'])->middleware(['auth', 'verified'])->name('payment.process');

// Keep old checkout routes for success page
Route::get('/checkout/success/{order}', [CheckoutController::class, 'success'])->middleware(['auth', 'verified'])->name('checkout.success');
Route::get('/checkout/cancel', [CheckoutController::class, 'cancel'])->middleware(['auth', 'verified'])->name('checkout.cancel');

Route::get('/customize', [CustomizeJuiceController::class, 'index'])->middleware(['auth', 'verified'])->name('customize');
Route::post('/customize', [CustomizeJuiceController::class, 'store'])->middleware(['auth', 'verified'])->name('customize.store');

// Cart API routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::put('/cart/update/{cartItem}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{cartItem}', [CartController::class, 'remove'])->name('cart.remove');
    Route::delete('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::get('/cart/count', [CartController::class, 'count'])->name('cart.count');
    
    // Favorite routes
    Route::post('/favorites/toggle', [FavoriteController::class, 'toggle'])->name('favorites.toggle');
    Route::post('/favorites/toggle-custom', [FavoriteController::class, 'toggleCustomJuice'])->name('favorites.toggle-custom');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
