<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\OngkirController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/shops', [ProductController::class, 'index'])->name('shops');

Route::get('/shops/products/{slug}', [ProductController::class, 'detail'])->name('product.detail');
Route::post('/add-keranjang', [ProductController::class, 'addKeranjang'])->name('add-keranjang');

Route::get('/lookbook', function () {
    return view('lookbook');
})->name('lookbook');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/orders', function () {
    return view('orders');
})->name('orders');

Route::get('/checkout', [\App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin routes
    Route::middleware(['admin'])->prefix('admin')->group(function () {
        Route::get('/chat-instructions', function () {
            return view('admin.tawk-instructions');
        })->name('admin.chat-instructions');
    });

    // Address
    Route::get('/provinces', [AddressController::class, 'getProvinces'])->name('get-provinces');
    Route::get('/regency/{provinceId}', [AddressController::class, 'getRegency'])->name('get-regency');
    Route::get('/district/{regencyId}', [AddressController::class, 'getDistrict'])->name('get-district');
    Route::get('/village/{districtId}', [AddressController::class, 'getVillage'])->name('get-village');
    Route::get('/add-address', [AddressController::class, 'create'])->name('create-address');
    Route::post('/add-address', [AddressController::class, 'addAddress'])->name('add-address');
    Route::get('/edit-address/{id}', [AddressController::class, 'edit'])->name('edit-address');
    Route::patch('/edit-address/{id}', [AddressController::class, 'update'])->name('update-address');
    Route::delete('/add-address/{id}', [AddressController::class, 'deleteAddress'])->name('delete-address');
});


Route::get('/ongkir', [OngkirController::class, 'index']);
Route::get('/destination', [OngkirController::class, 'getDestination']);
Route::post('/get-cost', [OngkirController::class, 'getCost'])->name('get-cost');

Route::post('/cart/checkout', [CartController::class, 'checkoutToSession'])->name('cart.checkoutToSession');

Route::post('/checkout/place-order', [App\Http\Controllers\CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');
Route::get('/checkout/success', function () {
    return view('checkout-success');
})->name('checkout.success');

require __DIR__ . '/auth.php';
