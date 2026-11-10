
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductVariantController;

// Landing page
Route::get('/', function () {
    return view('welcome');
});

// Login page
Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->name('login');

// Process login
Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


// Admin Routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Inventory - Product Registration
    Route::get('/inventory', function () {
        return view('admin.inventory');
    })->name('inventory');

    // Products - Product Listing
    Route::get('/products', [ProductController::class, 'index'])
        ->name('products.index');

    // Product Registration
    Route::post('/products', [ProductController::class, 'store'])
        ->name('products.store');

    // Category Management
    Route::get('/categories', [CategoryController::class, 'index'])
        ->name('categories.index');

    Route::post('/categories', [CategoryController::class, 'store'])
        ->name('categories.store');

    Route::put('/categories/{category}', [CategoryController::class, 'update'])
        ->name('categories.update');

    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])
        ->name('categories.destroy');
    
    // Products
Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

Route::patch('/products/{product}/availability', [ProductController::class, 'toggleAvailability'])
    ->name('products.availability');

    Route::post('/products', [ProductController::class, 'store'])
        ->name('products.store');

    Route::get('/products/{product}', [ProductController::class, 'show'])
        ->name('products.show');

    Route::put('/products/{product}', [ProductController::class, 'update'])
        ->name('products.update');

    Route::delete('/products/{product}', [ProductController::class, 'destroy'])
        ->name('products.destroy');


    // Product Variants
    Route::get('/products/{product}/variants', [ProductVariantController::class, 'index'])
        ->name('products.variants.index');

    Route::post('/products/{product}/variants', [ProductVariantController::class, 'store'])
        ->name('products.variants.store');

    Route::put('/products/{product}/variants/{variant}', [ProductVariantController::class, 'update'])
        ->name('products.variants.update');

    Route::delete('/products/{product}/variants/{variant}', [ProductVariantController::class, 'destroy'])
        ->name('products.variants.destroy');


});
