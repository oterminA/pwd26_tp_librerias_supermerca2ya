<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen de Compra - Supermerca2YA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5" style="max-width: 600px;">
        <div class="card shadow">
            <div class="card-header bg-success text-white text-center">
                <h2>🧾 Ticket de Compra</h2>
            </div>
            <div class="card-body">
                <ul class="list-group mb-4">
                    
                    <!-- Repite este bloque <li> por cada producto que mandó el controlador -->
                    @foreach($productos as $producto)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                
                                <!-- asset() busca la ruta correcta de la imagen dentro de tu carpeta 'public' -->
                                <img src="{{ asset($producto['imagen']) }}" alt="{{ $producto['nombre'] }}" style="width: 40px; height: 40px; object-fit: cover; border-radius: 5px; margin-right: 15px;">
                                
                                {{-- Las llaves dobles sirven para imprimir texto en la pantalla --}}
                                <span>{{ $producto['nombre'] }}</span>
                            </div>
                            
                            <!-- number_format le pone los puntos de miles al precio (ej: 1.500) -->
                            <span class="badge bg-primary rounded-pill fs-6">${{ number_format($producto['precio'], 0, ',', '.') }}</span>
                        </li>
                    @endforeach
                    
                </ul>
                <div class="alert alert-success text-end fs-4">
                    
                    <!-- Imprime la variable $total calculada en el controlador, también con separador de miles -->
                    <strong>Total a Pagar: </strong> ${{ number_format($total, 0, ',', '.') }}
                </div>
                <div class="text-center mt-4">
                    
                    <!-- url('/') genera el enlace para que el botón te lleve de vuelta a la ruta principal -->
                    <a href="{{ url('/') }}" class="btn btn-outline-secondary">Volver al inicio</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>