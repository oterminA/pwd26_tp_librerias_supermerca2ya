<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CarritoController extends Controller
{
    public function procesarCompra(Request $request)
    {
        // 1. Recibe el arreglo de IDs que envía el formulario
        $idsSeleccionados = $request->input('productos', []);

        if (empty($idsSeleccionados)) {
            return redirect('/')->with('error', 'No seleccionaste ningún producto.');
        }

        // 2. Lee el archivo JSON desde la subcarpeta data
        $rutaJson = public_path('data/productos.json');
        $catalogo = json_decode(file_get_contents($rutaJson), true);

        // 3. Calcula el total y arma la lista de comprados
        $productosComprados = [];
        $total = 0;

        // Aseguramos que los IDs del formulario se comparen correctamente como números
        $idsSeleccionados = array_map('intval', $idsSeleccionados);

        foreach ($catalogo as $item) {
            if (in_array($item['id'], $idsSeleccionados)) {
                $productosComprados[] = $item;
                $total += $item['precio'];
            }
        }

        // 4. Devuelve la vista con los datos
        return view('resumen', [
            'productos' => $productosComprados,
            'total' => $total
        ]);
    }
}