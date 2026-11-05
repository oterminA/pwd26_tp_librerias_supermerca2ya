<?php

namespace App\Models;

use Illuminate\Support\Facades\File;

class Carrito
{
    /**
     * funcion que trae el catálogo de produtos del json y lo pasa a un array php
     */
    public function all(): array
    {
        $rutaJson = public_path('data/productos.json'); //se trae la ruta del json

        if (File::exists($rutaJson)) { // si el archivo existe..
            $contenidoJson = File::get($rutaJson);
        } else { //si el archivo no existe
            $contenidoJson = '[]';
        }

        return json_decode($contenidoJson, true); //se retorna el json pasado a php como array
    }

    /**
     * funcion que procesa la compra devolviendo el precio total de la misma y los productos que el usuario 'compró'
    */
    public function calcularTotal($idsSeleccionados): array
    {
        $catalogo = self::all(); //se trae el catalogo de productos desde la funcion anterior
        $idsSeleccionados = array_map('intval', $idsSeleccionados); //se pasan los ids a integers porque estaban como string

        $productosComprados = []; //array de productos en vacío
        $total = 0; //acumulador en cero

        foreach ($catalogo as $item) { //se recorre el catagolo de productos
            if (in_array($item['id'], $idsSeleccionados)) { //se revisa si hay items del catalogo que coincidan con los productos comprados en base a sus ids
                $productosComprados[] = $item; //los items comprados se agregan al array vacio
                $total += $item['precio']; //se hace la acumulación de suma del precio de los productos comprados
            }
        }

        return [ //se retorna un array que tiene los productos comprados y el total de la compra
            'productos' => $productosComprados,
            'total'     => $total,
        ];
    }
}
