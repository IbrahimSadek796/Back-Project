<?php


use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\Postuser;
use Illuminate\Support\Facades\Route;


Route::get('/', [Postuser::class , 'showAll'])->name('');
Route::get('men', [Postuser::class , 'showMen'])->name('men');
Route::get('kids', [Postuser::class , 'showkids'])->name('kids');
Route::get('women', [Postuser::class , 'showwomen'])->name('women');
Route::get('shope', [Postuser::class , 'index'])->name('shope');
Route::get('show/{id}', [Postuser::class , 'show'])->name('show');





// Route::get('/shopping-cart', [CartController::class, 'showCart'])->name('shopping.cart');
// Route::post('/product', [CartController::class, 'addProducttoCart'])->name('addProduct');
// Route::patch('/update-shopping-cart', [CartController::class, 'update'])->name('update.sopping.cart');
// Route::delete('/delete-cart-product', [CartController::class, 'destroy'])->name('delete.cart.product');

Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
