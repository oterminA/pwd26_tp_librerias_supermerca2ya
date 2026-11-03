<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarritoController;

Route::get('/', function () {
    return view('formulario'); //esto es para que se muestre ewl formulario apenas se levanta el servidor
});
Route::post('/procesar-compra', [CarritoController::class, 'procesarCompra'])->name('compra.procesar');
Route::get('/carrito', [CarritoController::class, 'index'])->name('compra.carrito');


