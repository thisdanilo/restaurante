<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TenantController;

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

Route::group([
    'prefix' => 'dashboard/lanchonetes',
    'as' => 'tenant.',
    'controller' => TenantController::class,
], function () {
    Route::get('/', 'index')->name('index');

    Route::post('/datatable', 'datatable')->name('datatable');

    Route::get('{id}/show', 'show')->name('show');

    Route::get('/create', 'create')->name('create');

    Route::post('/', 'store')->name('store');

    Route::get('{id}/edit', 'edit')->name('edit');

    Route::put('{id}/update', 'update')->name('update');

    Route::get('{id}/confirm-delete', 'confirmDelete')->name('confirm_delete');

    Route::delete('{id}/delete', 'delete')->name('delete');
});
