<?php

use App\Http\Controllers\Client\OrderController;
use App\Http\Controllers\Client\ProfileController;
use App\Http\Controllers\Client\SiteController;
use App\Http\Controllers\Client\CheckoutController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index']);

Route::view('/login', 'client.login')->name('client.login')->middleware('guest');
Route::view('/register', 'client.register')->name('client.register')->middleware('guest');

Route::get('/product/{id}', [SiteController::class, 'product'])->name('client.product');

Route::get('/product-list/{id}', [SiteController::class, 'productList'])->name('client.productList');

Route::prefix('profile')
    ->middleware('auth')
    ->group(function () {
        Route::name('client.profile')->group(function () {
            Route::get('/', [ProfileController::class, 'show']);
            Route::post('/update', [ProfileController::class, 'updateGeneralInfo'])->name('.update');
            Route::post('/updatePassword', [ProfileController::class, 'updatePassword'])->name('.updatePassword');
            Route::post('/address', [ProfileController::class, 'saveAddress'])->name('.saveAddress');
        });
        Route::get('/checkout', [CheckoutController::class, 'show'])->name('client.checkout');
        Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('client.checkout.process');
        Route::get('/order/{order}', [OrderController::class, 'show'])->name('client.order');
});

Route::get('/wishlist', [ProfileController::class, 'wishList'])->name('client.wishList');
Route::get('/wishlist/count', [ProfileController::class, 'wishListCount'])->name('client.wishList.count');
Route::post('/wishlist/add', [ProfileController::class, 'addToWishList'])->name('client.wishList.add');

Route::get('/about-us', [SiteController::class, 'aboutUs'])->name('client.aboutUs');
Route::get('/privacy-policy', [SiteController::class, 'privacyPolicy'])->name('client.privacyPolicy');

Route::get('/faqs', [SiteController::class, 'faqs'])->name('client.faqs');

Route::get('/contact-us', [SiteController::class, 'contactUs'])->name('client.contactUs');
Route::post('/sendMessage', [SiteController::class, 'sendMessage'])->name('client.sendMessage');

Route::get('/cart', [SiteController::class, 'cart'])->name('client.cart');
Route::get('/cart/api', [SiteController::class, 'cartApi'])->name('client.cart.api');
Route::post('/addToCart', [SiteController::class, 'addToCart'])->name('client.addToCart');
