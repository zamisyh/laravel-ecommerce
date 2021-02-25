<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Home;
use App\Http\Livewire\Auth\Login;
use App\Models\User;
use App\Http\Livewire\Admin\Category\Category;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('auth')->group(function () {
    Route::get('login', Login::class)->name('login');
});

Route::prefix('admin')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::name('admin.')->group(function() {
            Route::get('/', Home::class)->name('home');
            Route::get('category', Category::class)->name('category');
            Route::get('category/{id}', Category::class)->name('category_edit');
        });
    });
});



