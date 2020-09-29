<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;

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

/**
 * Home route
 */
Route::get('/', [HomeController::class, 'index'])->name('home');

/**
 * Cart routes
 */
Route::get('/add/{name}', [CartController::class, 'add'])->name('cart.add');
Route::get('/remove/{name}', [CartController::class, 'remove'])->name('cart.remove');
