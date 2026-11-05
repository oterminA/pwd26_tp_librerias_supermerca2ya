<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;


class CarritoController extends Controller
{
    /**
     * funcion para retornar al formulario cuando se apreta el boton de 'volver al inicio'
    */
    public function index(){
         return view('formulario');
    }

    public function procesarCompra(Request $request)
    {
        $idsSeleccionados = $request->input('productos', []); //se recuperan los ids de los productos 'comprados'

        if (empty($idsSeleccionados)) { //si no hay ningun producto seleccionado se muestra un cartel en la vista usando los mensajes flash de sesión
            return redirect('/')->with('error', 'No seleccionaste ningún producto.');
        }

        $carrito = new Carrito; //se hace un new del modelo

        $resultado = $carrito->calcularTotal($idsSeleccionados); //se llama a la funcion del modelo que hace el calculo del total y devuelve los productos comprados

        //se devuelve a la vista con los productos comprados y el total de la compra para mostrar en resumen.blade.php
        return view('resumen', [
            'productos' => $resultado['productos'],
            'total'     => $resultado['total']
        ]);
    }
}
