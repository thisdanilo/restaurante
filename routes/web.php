<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TenantController;
use App\Http\Controllers\Admin\UserController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::prefix('dashboard')
    ->as('dashboard.')
    ->middleware('auth')
    ->get('/', DashboardController::class)
    ->name('index');

Route::group([
    'prefix' => 'dashboard/restaurantes',
    'as' => 'tenant.',
    'controller' => TenantController::class,
    'middleware' => 'auth',
], function () {
    Route::get('/', 'index')->middleware('can:tenant_show')->name('index');

    Route::post('/datatable', 'datatable')->middleware('can:tenant_show')->name('datatable');

    Route::get('{id}/ver', 'show')->middleware('can:tenant_show')->name('show');

    Route::get('/cadastrar', 'create')->middleware('can:tenant_create')->name('create');

    Route::post('/', 'store')->middleware('can:tenant_create')->name('store');

    Route::get('{id}/editar', 'edit')->middleware('can:tenant_edit')->name('edit');

    Route::put('{id}/editar', 'update')->middleware('can:tenant_edit')->name('update');

    Route::delete('{id}/excluir', 'delete')->middleware('can:tenant_delete')->name('delete');
});

Route::group([
    'prefix' => 'dashboard/funcao',
    'as' => 'role.',
    'controller' => RoleController::class,
    'middleware' => 'auth',
], function () {
    Route::get('/', 'index')->middleware('can:role_show')->name('index');

    Route::post('/datatable', 'datatable')->middleware('can:role_show')->name('datatable');

    Route::get('{id}/ver', 'show')->middleware('can:role_show')->name('show');

    Route::get('/cadastrar', 'create')->middleware('can:role_create')->name('create');

    Route::post('/', 'store')->middleware('can:role_create')->name('store');

    Route::get('{id}/editar', 'edit')->middleware('can:role_edit')->name('edit');

    Route::put('{id}/editar', 'update')->middleware('can:role_edit')->name('update');

    Route::delete('{id}/excluir', 'delete')->middleware('can:role_delete')->name('delete');
});

Route::group([
    'prefix' => 'dashboard/usuarios',
    'as' => 'user.',
    'controller' => UserController::class,
    'middleware' => 'auth',
], function () {
    Route::get('/', 'index')->middleware('can:user_show')->name('index');

    Route::post('/datatable', 'datatable')->middleware('can:user_show')->name('datatable');

    Route::get('{id}/ver', 'show')->middleware('can:user_show')->name('show');

    Route::get('/cadastrar', 'create')->middleware('can:user_create')->name('create');

    Route::post('/', 'store')->middleware('can:user_create')->name('store');

    Route::get('{id}/editar', 'edit')->middleware('can:user_edit')->name('edit');

    Route::put('{id}/editar', 'update')->middleware('can:user_edit')->name('update');

    Route::delete('{id}/excluir', 'delete')->middleware('can:user_delete')->name('delete');
});

Route::group([
    'prefix' => 'dashboard/categorias',
    'as' => 'category.',
    'controller' => CategoryController::class,
    'middleware' => 'auth',
], function () {
    Route::get('/', 'index')->middleware('can:category_show')->name('index');

    Route::post('/datatable', 'datatable')->middleware('can:category_show')->name('datatable');

    Route::get('{id}/ver', 'show')->middleware('can:category_show')->name('show');

    Route::get('/cadastrar', 'create')->middleware('can:category_create')->name('create');

    Route::post('/', 'store')->middleware('can:category_create')->name('store');

    Route::get('{id}/editar', 'edit')->middleware('can:category_edit')->name('edit');

    Route::put('{id}/editar', 'update')->middleware('can:category_edit')->name('update');

    Route::delete('{id}/excluir', 'delete')->middleware('can:category_delete')->name('delete');
});

require __DIR__.'/auth.php';
