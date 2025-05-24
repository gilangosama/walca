<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\OngkirController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CreateKeranjangsTableController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\MidtransController;

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

// Keranjang routes
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::patch('/cart/update/{id}', [CartController::class, 'updateQuantity'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'removeItem'])->name('cart.remove');
Route::post('/cart/checkout', [CartController::class, 'checkoutToSession'])->name('cart.checkoutToSession');
Route::post('/cart/migrate', [AuthenticatedSessionController::class, 'migrateCart'])->name('cart.migrate');
Route::get('/create-keranjangs-table', CreateKeranjangsTableController::class)->name('create-keranjangs-table');

Route::get('/orders', function () {
    return view('orders');
})->name('orders');

Route::get('/checkout', [\App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout');

Route::get('/dashboard', function () {
    return redirect('/');
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
    Route::post('/add-address', [AddressController::class, 'addAddress'])->name('add-address');
    Route::patch('/edit-address/{id}', [AddressController::class, 'editAddress'])->name('edit-address');
    Route::delete('/add-address/{id}', [AddressController::class, 'deleteAddress'])->name('delete-address');
});


Route::get('/ongkir', [OngkirController::class, 'index']);
Route::get('/destination', [OngkirController::class, 'getDestination']);
Route::post('/get-cost', [OngkirController::class, 'getCost'])->name('get-cost');

Route::post('/checkout/place-order', [App\Http\Controllers\CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');
Route::get('/checkout/success', function() {
    return view('checkout-success');
})->name('checkout.success');

// Midtrans Routes
Route::post('/midtrans/notification', [MidtransController::class, 'handleNotification'])->name('midtrans.notification');
Route::get('/midtrans/finish', [MidtransController::class, 'finishRedirect'])->name('midtrans.finish');
Route::get('/midtrans/unfinish', [MidtransController::class, 'unfinishRedirect'])->name('midtrans.unfinish');
Route::get('/midtrans/error', [MidtransController::class, 'errorRedirect'])->name('midtrans.error');

require __DIR__ . '/auth.php';
