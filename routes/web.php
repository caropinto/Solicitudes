<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CuentasController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [CuentasController::class, 'index'])->name('home');
// Route::get('/home/{id}', [CuentasController::class, 'show'])->name('cuenta');
// Route::get('/home/{id}/movimiento', [CuentasController::class, 'newMovement'])->name('nuevoMovimiento');
// Route::post('/home/{id}/movimiento', [CuentasController::class, 'storeMovement']);

Route::controller(CuentasController::class)->prefix('cuentas')->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/crear', 'create')->name('crearCuenta');
    Route::post('/crear', 'store');
    Route::get('/{id}', 'show')->name('cuenta');
    Route::get('/{id}/movimiento', 'newMovement')->name('nuevoMovimiento');
    Route::post('/{id}/movimiento', 'storeMovement');
});