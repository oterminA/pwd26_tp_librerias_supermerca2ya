<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarritoController; // Importamos el controlador para poder usarlo

Route::get('/', function () {
    return view('formulario'); // esto es para que se muestre el formulario apenas se levanta el servidor
});

// Recibe los datos del formulario por POST y ejecuta la función 'procesarCompra' del controlador
Route::post('/procesar-compra', [CarritoController::class, 'procesarCompra'])->name('compra.procesar');