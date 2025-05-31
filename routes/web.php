<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Database\Factories\ProductFactory;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\SingleProduct;
use App\Http\Livewire\Cart;
use App\Http\Livewire\Checkout;
use App\Http\Livewire\Orders;
use App\Http\Livewire\Shop;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admindashboard', function () {
    return view('admindashboard');
})->middleware(['auth', 'verified'])->name('admindashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Route::get(
//     '/GetAllProducts',
//     [ProductController::class, 'index']
// )->middleware('auth:sanctum');

Route::get('/product/{id}', SingleProduct::class)->name('product.view');
// Route::get('/', [ProductController::class, 'index']);
Route::get('/addproduct', function () {
    return view('addproduct');
})->middleware(['auth', 'verified'])->name('addproduct');
Route::post('/addproduct', [ProductController::class, 'store'])->middleware(['auth', 'verified'])->name('product.store');
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('editproduct');

// http://127.0.0.1:8000/product/{id}/edit


Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');

Route::get('/shop', Shop::class)->name('shop');

Route::middleware('auth')->group(function () {
    Route::get('/cart', Cart::class)->name('cart.view');
});

Route::get('/checkout', Checkout::class)->middleware('auth')->name('checkout');
Route::get('/orders', Orders::class)->middleware('auth')->name('orders');


Route::get('/orderconfirm', function () {
    return view('orders.confirm');
})->name('orders.confirm');

Route::get('/admin-products', \App\Http\Livewire\AdminProducts::class)->name('admin.products');

require __DIR__ . '/auth.php';
