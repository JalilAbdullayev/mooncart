<?php

use App\Http\Controllers\Admin\CampaignController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\FAQController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\Products\CategoryController;
use App\Http\Controllers\Admin\Products\ProductController;
use App\Http\Controllers\Admin\Products\ProductImagesController;
use App\Http\Controllers\Admin\Products\TagController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\SubscribersController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\UserRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

function routes($prefix, $controller) {
    Route::prefix($prefix)->name($prefix . '.')->group(function() use ($controller) {
        Route::get('/', [$controller, 'index'])->name('index');
        Route::prefix('create')->name('create')->group(function() use ($controller) {
            Route::get('/', [$controller, 'create']);
            Route::post('/', [$controller, 'store']);
        });
        Route::prefix('edit/{id}')->name('edit')->group(function() use ($controller) {
            Route::get('/', [$controller, 'edit']);
            Route::post('/', [$controller, 'update']);
        });
        Route::get('delete/{id}', [$controller, 'delete'])->name('delete');
    });
}

function routes2($prefix, $controller) {
    Route::prefix($prefix)->name($prefix . '.')->group(function() use ($controller) {
        Route::get('/', [$controller, 'index'])->name('index');
        Route::post('store', [$controller, 'store'])->name('store');
        Route::prefix('edit/{id}')->name('edit')->group(function() use ($controller) {
            Route::get('/', [$controller, 'edit']);
            Route::post('/', [$controller, 'update']);
        });
        Route::get('delete/{id}', [$controller, 'delete'])->name('delete');
    });
}

function deleteImage($prefix, $conroller) {
    Route::get($prefix . '/deleteImage/{id}', [$conroller, 'deleteImage'])->name($prefix . '.deleteImage');
}

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('signup', [HomeController::class, 'signUp'])->name('signup');
Route::post('subscribe', [HomeController::class, 'subscribe'])->name('subscribe');
Route::prefix('contact')->name('contact')->group(function() {
    Route::get('/', [HomeController::class, 'contact']);
    Route::post('/', [HomeController::class, 'contactForm']);
});

Route::prefix('faq')->name('faq.')->group(function() {
    Route::get('/', [HomeController::class, 'faq'])->name('index');
    Route::get('search', [HomeController::class, 'searchFaq'])->name('search');
});

Route::get('our-team', [HomeController::class, 'staff'])->name('our-team');

Route::prefix('shop')->name('shop.')->group(function() {
    Route::get('/', [HomeController::class, 'shop'])->name('index');
    Route::get('search', [HomeController::class, 'searchShop'])->name('search');
});
Route::get('product/{slug}', [HomeController::class, 'product'])->name('product');
Route::post('addToCart/{id}', [CartController::class, 'addToCart'])->name('addToCart');
Route::get('categories/{slug}', [HomeController::class, 'category'])->name('category');
Route::get('tags/{slug}', [HomeController::class, 'tag'])->name('tag');

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function() {
    Route::post('logout', static function() {
        Auth::logout();
        return redirect()->to('login');
    })->name('logout');

    Route::prefix('profile')->name('profile.')->group(function() {
        Route::get('/', [ProfileController::class, 'index'])->name('index');
        Route::post('update', [ProfileController::class, 'update'])->name('update');
        Route::get('delete', [ProfileController::class, 'delete'])->name('delete');
    });

    Route::get('/', [MainController::class, 'index'])->name('index');
    Route::prefix('settings')->middleware(UserRole::class)->name('settings')->group(function() {
        Route::get('/', [SettingsController::class, 'index']);
        Route::post('/', [SettingsController::class, 'update']);
    });

    Route::prefix('users')->middleware(UserRole::class)->name('users.')->group(function() {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('create', [UserController::class, 'create'])->name('create');
        Route::prefix('edit/{id}')->name('edit')->group(function() {
            Route::get('/', [UserController::class, 'edit']);
            Route::post('/', [UserController::class, 'update']);
        });
        Route::get('delete/{id}', [UserController::class, 'delete'])->name('delete');
    });

    Route::prefix('messages')->name('messages.')->group(function() {
        Route::get('/', [ContactController::class, 'index'])->name('index');
        Route::get('delete/{id}', [ContactController::class, 'delete'])->name('delete');
        Route::get('read/{id}', [ContactController::class, 'read'])->name('read');
    });

    Route::prefix('subscribers')->name('subscribers.')->group(function() {
        Route::get('/', [SubscribersController::class, 'index'])->name('index');
        Route::get('delete/{id}', [SubscribersController::class, 'delete'])->name('delete');
    });

    routes('campaigns', CampaignController::class);
    deleteImage('campaigns', CampaignController::class);

    routes2('categories', CategoryController::class);
    deleteImage('categories', CategoryController::class);

    routes('faq', FAQController::class);

    routes('staff', StaffController::class);

    routes2('tags', TagController::class);

    routes('products', ProductController::class);

    Route::prefix('products/{id}/images')->name('products.images.')->group(function() {
        Route::get('/', [ProductImagesController::class, 'index'])->name('index');
        Route::post('/', [ProductImagesController::class, 'store'])->name('store');
        Route::get('featured', [ProductImagesController::class, 'featured'])->name('featured');
    });
    Route::get('products/images/delete/{image}', [ProductImagesController::class, 'delete'])->name('products.images.delete');

    routes('features', FeatureController::class);
    deleteImage('features', FeatureController::class);

    Route::get('cart', [CartController::class, 'index'])->name('cart');
    Route::get('deleteFromCart/{id}', [CartController::class, 'deleteFromCart'])->name('deleteFromCart');
    Route::post('changeQuantity/{id}', [CartController::class, 'changeQuantity'])->name('changeQuantity');
    Route::get('emptyCart', [CartController::class, 'emptyCart'])->name('emptyCart');
    Route::post('submitCart', [CartController::class, 'submitCart'])->name('submitCart');

    Route::prefix('orders')->name('orders.')->group(function() {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('all', [OrderController::class, 'all'])->name('all');
        Route::get('user/{id}', [OrderController::class, 'user'])->name('user');
    });

    Route::prefix('order')->name('order.')->group(function() {
        Route::get('{id}', [OrderController::class, 'order'])->name('index');
        Route::get('delete/{id}', [OrderController::class, 'delete'])->name('delete');
    });
});

Auth::routes();
