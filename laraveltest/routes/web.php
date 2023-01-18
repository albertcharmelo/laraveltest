<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'compras', 'middleware' => 'auth'], function () {
    Route::get('/', [App\Http\Controllers\ComprasController::class, 'index'])->name('compras.index');
    Route::post('comprar', [App\Http\Controllers\ComprasController::class, 'comprar'])->name('compras.comprar');
});


Route::group(['prefix' => 'panel', 'middleware' => ['auth', 'checkrole']], function () {
    Route::get('/', [App\Http\Controllers\PanelController::class, 'index'])->name('panel.index');
    Route::post('generar_factura_pendiente', [App\Http\Controllers\PanelController::class, 'generar_factura_pendiente'])->name('panel.generar_factura_pendiente');
    Route::get('factura/{id}', [App\Http\Controllers\PanelController::class, 'factura'])->name('panel.factura');
});
