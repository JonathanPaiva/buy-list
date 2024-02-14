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

Route::get('/', function () {
    return view('site.layouts.app');
})->middleware(['auth', 'verified'])->name('home');

Route::get('/home', function () {
    return view('site.layouts.app');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/categories',[CategoryController::class,'index'])->name('categories');
    Route::get('/categories/{id}/edit',[CategoryController::class,'edit'])->name('categories.edit');
    Route::put('/categories/{id}',[CategoryController::class,'update'])->name('categories.update');
    Route::get('/categories/create',[CategoryController::class,'create'])->name('categories.create');
    Route::post('/categories',[CategoryController::class,'store'])->name('categories.store');
    Route::delete('/categories/{id}',[CategoryController::class,'destroy'])->name('categories.destroy');

    Route::get('/products',[ProductController::class,'index'])->name('products');

    Route::get('/listings',[ListingController::class,'index'])->name('listings');
    Route::get('/listings/{id}/edit',[ListingController::class,'edit'])->name('listings.edit');
    Route::put('/listings/{id}',[ListingController::class,'update'])->name('listings.update');
    Route::get('/listings/create',[ListingController::class,'create'])->name('listings.create');
    Route::post('/listings',[ListingController::class,'store'])->name('listings.store');
    Route::delete('/listings/{id}',[ListingController::class,'destroy'])->name('listings.destroy');

    Route::get('/products-listings',[ProductListingController::class,'index'])->name('products-listings');
});

require __DIR__.'/auth.php';
