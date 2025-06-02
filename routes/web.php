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
use App\Http\Livewire\Profile;
use App\Http\Livewire\OrderView;
use App\Http\Livewire\AdminDashboard;
use App\Http\Livewire\AdminProducts;
use App\Http\Livewire\Users;
use App\Http\Middleware\AdminMiddleware;


Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/my-profile', Profile::class)->middleware('auth')->name('profile.page');

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


// Route::get('/addproduct', function () {
//     return view('addproduct');
// })->middleware(['auth', 'verified'])->name('addproduct');



// Route::post('/addproduct', [ProductController::class, 'store'])->middleware(['auth', 'verified'])->name('product.store');


// http://127.0.0.1:8000/product/{id}/edit



Route::get('/shop', Shop::class)->name('shop');

Route::middleware('auth')->group(function () {
    Route::get('/cart', Cart::class)->name('cart.view');
});

Route::get('/checkout', Checkout::class)->middleware('auth')->name('checkout');
// Route::get('/orders', Orders::class)->middleware('auth')->name('orders');


Route::get('/orderconfirm', function () {
    return view('orders.confirm');
})->name('orders.confirm');


// Route::get('/admin/order/{id}', OrderView::class)->middleware('auth')->name('order.view');

Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admindashboard', AdminDashboard::class)->middleware(['auth'])->name('admindashboard');
    Route::get('/addproduct', fn() => view('addproduct'))->name('addproduct');
    Route::post('/addproduct', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('editproduct');
    Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/admin-products', AdminProducts::class)->name('admin.products');
    Route::get('/admin/order/{id}', OrderView::class)->name('order.view');
    Route::get('/orders', Orders::class)->name('orders');
    Route::get('/users', Users::class)->name('users');
});


require __DIR__ . '/auth.php';
