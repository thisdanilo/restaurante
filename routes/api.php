<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group([
    'prefix' => '/',
    'as' => 'api.',
    'controller' => ApiController::class,
], function () {
    Route::get('/produtos', 'product')->name('product');

    Route::get('/restaurantes', 'restaurant')->name('restaurant');

    Route::get('/pesquisa-produtos', 'search')->name('search');
});
