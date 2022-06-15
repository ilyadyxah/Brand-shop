<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])
    ->name('shop::home');

Route::get('/card/{id}', [CardController::class, 'index'])
    ->name('shop::card');
Route::get( '/option-price', [CardController::class, 'getPriceOption']);

Route::get('/catalog/', [CatalogController::class, 'index'])
    ->name('shop::catalog::index');
Route::get('/filtered/catalog', [CatalogController::class, 'categoryFilter'])
    ->name('shop::catalog::filter');


Route::get('/cart', [CartController::class, 'index'])
    ->name('shop::cart');
Route::get('/cart/clear', [CartController::class, 'clear'])
    ->name('shop::cart::clear');
Route::post('/cart/add/', [CartController::class, 'addItem'])
    ->name('shop::cart::add');
Route::get('/cart/delete/{id}', [CartController::class, 'deleteItem'])
    ->name('shop::cart::delete');

Route::get('/registration', [RegistrationController::class, 'index'])
    ->name('shop::registration');
