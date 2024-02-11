<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductListingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', function () {
    return view('site.home');
})->middleware(['auth', 'verified'])->name('home');

Route::get('/home2', function () {
    return view('site.home2');
})->middleware(['auth', 'verified'])->name('home2');

Route::middleware('auth')->group(function () {
    Route::get('/', function(){
        return view('dashboard');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/products',[ProductController::class,'index'])->name('products.index');

    Route::get('/categories',[CategoryController::class,'index'])->name('categories.index');

    Route::get('/listings',[ListingController::class,'index'])->name('listings.index');

    Route::get('/products-listings',[ProductListingController::class,'index'])->name('products-listings.index');
});

require __DIR__.'/auth.php';
