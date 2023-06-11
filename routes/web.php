<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

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

// Show Main Page
Route::get('/', [ItemController::class, 'items_menu'])->name('empty');
Route::get('/items_menu', [ItemController::class, 'items_menu'])->name('main');

// Show Favorite Page
Route::get('/favorites_menu', [ItemController::class, 'favorites_menu']);

// Toggle Item To Favorite
Route::post('/toggle_favorite', [ItemController::class, 'toggle_favorite']);

// Add Item To Cart
Route::post('/add_to_cart', [ItemController::class, 'add_to_cart']);

// Remove Item From Cart
Route::post('/delete_cart_item', [ItemController::class, 'delete_cart_item']);

// Show Cart Data
Route::get('/cart', [ItemController::class, 'cart']);
