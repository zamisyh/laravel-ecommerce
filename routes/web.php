<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Home;
use App\Http\Livewire\Auth\Login;
use App\Models\User;
use App\Http\Livewire\Admin\Category\Category;
use App\Http\Livewire\Admin\Product\ListProduct;
use Illuminate\Support\Facades\Storage;
use App\Http\Livewire\Client\Index as HomeClient;
use App\Http\Livewire\Client\Product\Detail;
use App\Http\Livewire\Client\Product\Shop;
use App\Http\Livewire\Client\Product\Cart;
use App\Http\Livewire\Client\Product\Checkout;
use App\Http\Livewire\Client\Tes;

/*
|--------------------------------------------------------------------------
| Web Routesse
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::name('client.')->group(function () {
    Route::get('/', HomeClient::class)->name('home');
    Route::get('/product/{slug}', Detail::class);
    Route::get('cart', Cart::class)->name('cart');
    Route::get('/product', Shop::class)->name('shop');
    Route::get('checkout', Checkout::class)->name('checkout');
    Route::get('tes', Tes::class);
});




Route::prefix('auth')->group(function () {
    Route::get('login', Login::class)->name('login');
});

Route::prefix('admin')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::name('admin.')->group(function () {
            Route::get('/', Home::class)->name('home');
            Route::get('category', Category::class)->name('category');
            Route::get('product', ListProduct::class)->name('product');
        });
    });
});
