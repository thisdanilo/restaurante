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

Route::get('/', function () {
    return view('auth.login');
});

Route::group([
    'prefix' => 'dashboard/lanchonetes',
    'as' => 'tenant.',
    'controller' => TenantController::class,
    'middleware' => 'auth'
], function () {
    Route::get('/', 'index')->middleware('can:tenant_show')->name('index');

    Route::post('/datatable', 'datatable')->middleware('can:tenant_show')->name('datatable');

    Route::get('{tenant}/ver', 'show')->middleware('can:tenant_show')->name('show');

    Route::get('/cadastrar', 'create')->middleware('can:tenant_create')->name('create');

    Route::post('/', 'store')->middleware('can:tenant_create')->name('store');

    Route::get('{tenant}/editar', 'edit')->middleware('can:tenant_edit')->name('edit');

    Route::put('{tenant}/editar', 'update')->middleware('can:tenant_edit')->name('update');

    Route::delete('{tenant}/excluir', 'delete')->middleware('can:tenant_delete')->name('delete');
});

require __DIR__ . '/auth.php';
