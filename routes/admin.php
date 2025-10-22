<?php

use App\Http\Controllers\Admin\{AboutController, CategoryController, ContactController, FAQController, ProductController, ProfileController, SettingController, UserController};
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::name('admin.')->group(function () {
        Route::view('/register', 'admin.auth.register')->name('register')->middleware('guest');
        Route::view('/login', 'admin.auth.login')->name('login')->middleware('guest');
        Route::view('/forget-password', 'admin.auth.forget-password')->name('forgetPassword')->middleware('guest');
        
        Route::middleware(['auth', 'admin'/*, 'verified', 'active'*/])->group(function() {
            Route::get('/', function() { return redirect(route('admin.dashboard')); });
            Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
            Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
            Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('updateProfile');
            
            Route::prefix('users')->group(function () {
                Route::name('users.')->group(function () {
                    Route::get('/', [UserController::class, 'index'])->name('index');
                    Route::post('/toggleActive', [UserController::class, 'toggleActive'])->name('toggleActive');
                });
            });

            Route::resource('categories', CategoryController::class)->only(['index', 'store', 'update', 'destroy']);
            Route::post('categories/toggleActive', [CategoryController::class, 'toggleActive'])->name('categories.toggleActive');

            Route::resource('products', ProductController::class)->only(['index', 'store', 'update', 'destroy']);
            Route::post('products/toggleActive', [ProductController::class, 'toggleActive'])->name('products.toggleActive');
            Route::post('products/removeImage', [ProductController::class, 'removeImage'])->name('products.removeImage');

            Route::resource('abouts', AboutController::class)->only(['index', 'store', 'update', 'destroy']);
            Route::post('abouts/toggleActive', [AboutController::class, 'toggleActive'])->name('abouts.toggleActive');

            Route::resource('faqs', FAQController::class)->only(['index', 'store', 'update', 'destroy']);
            Route::post('faqs/toggleActive', [FAQController::class, 'toggleActive'])->name('faqs.toggleActive');

            Route::resource('settings', SettingController::class)->only(['index', 'store', 'update']);
            
            Route::resource('messages', ContactController::class)->only(['index', 'show', 'destroy']);
            Route::post('messages/reply', [ContactController::class, 'reply'])->name('messages.reply');
        });
    });
});