<?php

use App\Http\Controllers\agint\agintController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [agintController::class , 'showAll'])->name('visitor.');
Route::get('men', [agintController::class , 'showMen'])->name('visitor.men');
Route::get('kids', [agintController::class , 'showkids'])->name('visitor.kids');
Route::get('women', [agintController::class , 'showwomen'])->name('visitor.women');
Route::get('shope', [agintController::class , 'index'])->name('visitor.shope');
Route::get('show/{id}', [agintController::class , 'show'])->name('visitor.show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
