<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/',[ProductController::class,'index'])->name('products.index');
    Route::get('/products',[ProductController::class,'allProducts'])->name('allProducts');
    Route::get('/products/create',[ProductController::class,'create'])->name('products.create');
    Route::post('/products',[ProductController::class,'store'])->name('products.store');
    Route::get('/products/{id}',[ProductController::class,'show'])->name('products.show');
    Route::get('/products/{id}/edit',[ProductController::class,'edit'])->name('products.edit');
    Route::patch('/products/{id}',[ProductController::class,'update'])->name('products.update');
    Route::delete('/products/{id}',[ProductController::class,'destroy'])->name('products.destroy');
});

require __DIR__.'/auth.php';
