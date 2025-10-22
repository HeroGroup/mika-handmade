<?php

use App\Http\Controllers\Client\OrderController;
use App\Http\Controllers\Client\ProfileController;
use App\Http\Controllers\Client\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index']);

Route::get('/product/{id}', [SiteController::class, 'product'])->name('client.product');

Route::get('/product-list/{id}', [SiteController::class, 'productList'])->name('client.productList');

Route::prefix('profile')->group(function () {
    Route::name('client.profile')->group(function () {
        Route::get('/', [ProfileController::class, 'show']);
        Route::post('/update', [ProfileController::class, 'updateGeneralInfo'])->name('.update');
        Route::post('/updatePassword', [ProfileController::class, 'updatePassword'])->name('.updatePassword');
    });
});

Route::get('/wishlist', [ProfileController::class, 'wishList'])->name('client.wishList');
Route::get('/wishlist/count', [ProfileController::class, 'wishListCount'])->name('client.wishList.count');
Route::post('/wishlist/add', [ProfileController::class, 'addToWishList'])->name('client.wishList.add');

Route::get('/order', [OrderController::class, 'show'])->name('client.order');

Route::get('/about-us', [SiteController::class, 'aboutUs'])->name('client.aboutUs');

Route::get('/faqs', [SiteController::class, 'faqs'])->name('client.faqs');

Route::get('/contact-us', [SiteController::class, 'contactUs'])->name('client.contactUs');
Route::post('/sendMessage', [SiteController::class, 'sendMessage'])->name('client.sendMessage');

Route::get('/cart', [SiteController::class, 'cart'])->name('client.cart'); // TODO: auth middleware
Route::get('/cart/api', [SiteController::class, 'cartApi'])->name('client.cart.api');
Route::post('/addToCart', [SiteController::class, 'addToCart'])->name('client.addToCart');
