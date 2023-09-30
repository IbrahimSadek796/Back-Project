<?php


use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\Postuser;
use App\Http\Controllers\User\ProfilesController;
use Illuminate\Support\Facades\Route;


Route::get('/', [Postuser::class , 'showAll'])->name('');
Route::get('men', [Postuser::class , 'showMen'])->name('men');
Route::get('kids', [Postuser::class , 'showkids'])->name('kids');
Route::get('women', [Postuser::class , 'showwomen'])->name('women');
Route::get('shope', [Postuser::class , 'index'])->name('shope');
Route::get('show/{id}', [Postuser::class , 'show'])->name('show');


Route::get('/orders', [CartController::class, 'orders'])->name('orders');
Route::get('/shopping-cart', [CartController::class, 'postCart'])->name('shopping.cart');
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('addpost.to.cart');
Route::patch('/update-shopping-cart', [CartController::class, 'update'])->name('update.sopping.cart');
Route::delete('/delete-cart-product/{id}', [CartController::class, 'destroy'])->name('delete.cart.product');


Route::get('edit', [ProfilesController::class, 'edit'])->name('edit');
Route::put('update', [ProfilesController::class, 'update'])->name('update');
