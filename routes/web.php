<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\homecontroller;
use App\Http\Controllers\admin\EmployeeController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\user\TouristController as TouristHomeController;
use App\Http\Controllers\user\ProductController;
use App\Http\Controllers\CartController;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboardd', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth')->group(function () {
    Route::get('/trips', [TouristHomeController::class, 'trips'])->name('trips.index');
    Route::get('/trips/{id}/edit', [TouristHomeController::class, 'edit'])->name('trips.edit');
    Route::put('/trips/{id}', [TouristHomeController::class, 'update'])->name('trips.update');
    Route::delete('/trips/{id}',[TouristHomeController::class, 'destroy'])->name('destroy');
    Route::get('/trips/create', [TouristHomeController::class, 'create'])->name('create');
    Route::post('/trips', [TouristHomeController::class, 'store'])->name('store');
    Route::get('/home', [TouristHomeController::class, 'home'])->name('home');
    Route::get('/about', [TouristHomeController::class, 'about'])->name('about');
    Route::get('/trips/{id}/buy', [TouristHomeController::class, 'buy'])->name('buy');
    Route::post('/purchases', [TouristHomeController    ::class, 'storePurchase'])->name('purchase.store');
    Route::get('/purchases', [TouristHomeController::class, 'index'])->name('purchases');
});

Route::middleware('auth')->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('/products/{id}/buy', [ProductController::class, 'buy'])->name('products.buy.page');
    Route::post('/products/{id}/buy', [ProductController::class, 'buy'])->name('products.buy');
    Route::post('/product-purchases', [ProductController::class, 'storePurchase'])->name('products.purchase.store');
});

Route::middleware('auth')->group(function () {
    Route::post('/cart/{productId}/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
    Route::delete('/cart/{cartId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::put('/cart/{cartId}', [CartController::class, 'updateCart'])->name('cart.update');
    Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
});

Route::middleware('guest')->controller(auth_controller::class)->group(function(){
    Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout')->withoutMiddleware('guest');
});


Route::middleware(['auth','IsAdmin'])->prefix('admin')->name('admin.')->group(function() {
    Route::get('/', [homecontroller::class, 'index'])->name('home');
    Route::controller(EmployeeController::class)->name('employee.')->group(function() {
        Route::get('/employee', 'index')->name('index');
        Route::get('/employee/create', 'create')->name('create');
        Route::get('/employee/{id}', 'show')->where(['id' => '[0-9]+'])->name('show');
        Route::post('/employee', 'store')->name('store');
        Route::delete('/employee/{id}','destroy')->name('destroy');
        Route::get('/employee/{id}/edit', 'edit')->name('edit');
        Route::put('/employee/{id}', 'update')->name('update');
        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    });

});

require __DIR__.'/auth.php';
