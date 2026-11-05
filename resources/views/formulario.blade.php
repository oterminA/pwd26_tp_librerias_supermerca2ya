<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supermerca2YA </title>
    <!-- acá va lo de BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- así se incluye TOM SELECT al proyecto para darle la parte visual -->
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.min.css" rel="stylesheet">

    <!-- {{-- este es el css del tp, está en public/css --}} -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="container mt-5 contenedor-gral">
        <h1> Supermerca2YA 🍎</h1>
        {{-- esto es para poder mostrar el cartel que viene desde el control " return redirect('/')->with('error', 'No seleccionaste ningún producto.');" --}}
        @if (session('error'))
            <div
                style="padding: 14px 20px; margin-bottom: 24px; color: #721c24; background-color: #f8d7da; border: 1px solid #f5c6cb;border-radius: 8px;">
                <span>{{ session('error') }}</span>
            </div>
        @endif

        <form action="{{ route('compra.procesar') }}" method="POST">
            @csrf
            {{-- acá va lo del buscador con las listas de productos
            pluggin: optgroup --}}
            <select id="buscador-productos" name="productos[]" class="form-control" multiple
                autocomplete="off"></select>

            <hr>
            <div class="container mt-4">
                <h3>Catálogo de productos por categoría</h3>

                <!-- 1. frescos
                    plugin: remove_button -->
                <div class="mb-3">
                    <label for="select-frescos" class="form-label">Frescos <i><small>(Remove button)</small></i>:</label>
                    <select id="select-frescos" name="productos[]" multiple autocomplete="off"
                        class="form-select"></select>
                </div>

                <!-- 2. almacén
                    plugin: clear_button -->
                <div class="mb-3">
                    <label for="select-almacen" class="form-label">Almacén <i><small>(Clear Button)</small></i>:</label>
                    <select id="select-almacen" name="productos[]" multiple autocomplete="off"
                        class="form-select select-almacen"></select>
                </div>

                <!-- 3. verduras
                    plugin: checkbox_options -->
                <div class="mb-3">
                    <label for="select-verduras" class="form-label">Verduras <i><small>(Checkboxes</small>)</i>:</label>
                    <select id="select-verduras" name="productos[]" multiple autocomplete="off"
                        class="form-select"></select>
                </div>

                <!-- 4. frutas
                    plugin: dropdown_header-->
                <div class="mb-3">
                    <label for="select-frutas" class="form-label">Frutas <i><small>(Dropdown
                                Header)</small></i>:</label>
                    <select id="select-frutas" name="productos[]" multiple autocomplete="off"
                        class="form-select"></select>
                </div>

                <!-- 5. carnes
                    plugin: restore_on_backspace -->
                <div class="mb-3">
                    <label for="select-carnes" class="form-label">Carnes <i><small>(Restore on
                                Backspace)</small></i>:</label>
                    <select id="select-carnes" name="productos[]" multiple autocomplete="off"
                        class="form-select select-carnes"></select>
                </div>

                <!-- 6. limpieza
                    plugin: autogrow -->
                <div class="mb-3">
                    <div class="d-inline-block">
                        <label for="select-limpieza" class="form-label">Limpieza
                            <i><small>(Autogrow)</small></i>:</label>
                        <select id="select-limpieza" name="productos[]" multiple autocomplete="off"
                            class="form-select"></select>
                    </div>
                </div>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                <button type="submit" class="btn btn-outline-danger">🛒</button>
            </div>
            <hr>
            <footer>
                <p id="p-footer">Trabajo realizado para TP de librerías usando Tom Select, PWD 2026. <br> Hernández,
                    Villagran, Otermin.</p>
            </footer>
        </form>
    </div>

    <!-- acá van los scripts de BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- {{-- así se incluye TOM SELECT al proyecto para darle la logica a los plugins --}} -->
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    <script src="{{ asset('js/js.js') }}"></script>
</body>

</html>
