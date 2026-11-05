<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CarritoController extends Controller
{
    public function procesarCompra(Request $request)
    {
        // Guarda los IDs que llegaron del formulario, o un arreglo vacío si no hay nada
        $idsSeleccionados = $request->input('productos', []);

        // Si no eligió nada, lo devuelve a la página principal con un error
        if (empty($idsSeleccionados)) {
            return redirect('/')->with('error', 'No seleccionaste ningún producto.');
        }

        // Obtiene la ruta exacta del servidor hacia tu archivo JSON
        $rutaJson = public_path('data/productos.json');
        
        // Lee el archivo JSON y lo convierte en un arreglo de PHP
        $catalogo = json_decode(file_get_contents($rutaJson), true);

        $productosComprados = [];
        $total = 0;

        // Convierte todos los IDs recibidos a números enteros para compararlos bien
        $idsSeleccionados = array_map('intval', $idsSeleccionados);

        // Recorre todos los productos del catálogo uno por uno
        foreach ($catalogo as $item) {
            
            // Revisa si el ID del producto actual está en la lista que eligió el usuario
            if (in_array($item['id'], $idsSeleccionados)) {
                
                // Si coincide, guarda el producto en la lista final del ticket
                $productosComprados[] = $item;
                
                // Y le suma su precio a la variable del total
                $total += $item['precio'];
            }
        }

        // Muestra la pantalla del ticket pasándole los productos filtrados y la suma total
        return view('resumen', [
            'productos' => $productosComprados,
            'total' => $total
        ]);
    }
}