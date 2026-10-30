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

    {{-- este es el css del tp, está en public/css --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="container mt-5 contenedor-gral">
        <h1> Supermerca2YA 🍎</h1>

        <form action="#" method="POST">
            @csrf
            {{-- acá va lo del buscador con las listas de productos
            pluggin: optgroup y remove_button --}}
            <input type="text" id="buscador-productos" placeholder=" 🔎︎ Buscá tus productos..."
                class="form-control">

            <hr>
            <div class="container mt-4">
                <h3>Catálogo de productos por categoría</h3>

                <!-- 1. frescos
                    plugin: drag_drop -->
                <div class="mb-3">
                    <label for="select-frescos" class="form-label">Frescos <i><small>(Drag & Drop)</small></i>:</label>
                    <select id="select-frescos" multiple autocomplete="off" class="form-select"></select>
                </div>

                <!-- 2. almacén
                    plugin: clear_button -->
                <div class="mb-3">
                    <label for="select-almacen" class="form-label">Almacén <i><small>(Clear Button)</small></i>:</label>
                    <select id="select-almacen" multiple autocomplete="off" class="form-select"></select>
                </div>

                <!-- 3. verduras
                    plugin: checkbox_options -->
                <div class="mb-3">
                    <label for="select-verduras" class="form-label">Verduras <i><small>(Checkboxes</small>)</i>:</label>
                    <select id="select-verduras" multiple autocomplete="off" class="form-select"></select>
                </div>

                <!-- 4. frutas
                    plugin: dropdown_header y render para fotos-->
                <div class="mb-3">
                    <label for="select-frutas" class="form-label">Frutas <i><small>(Dropdown
                                Header)</small></i>:</label>
                    <select id="select-frutas" multiple autocomplete="off" class="form-select"></select>
                </div>

                <!-- 5. carnes
                    plugin: restore_on_backspace -->
                <div class="mb-3">
                    <label for="select-carnes" class="form-label">Carnes <i><small>(Restore on
                                Backspace)</small></i>:</label>
                    <select id="select-carnes" multiple autocomplete="off" class="form-select"></select>
                </div>

                <!-- 6. limpieza
                    plugin: autogrow -->
                <div class="mb-3">
                    <label for="select-limpieza" class="form-label">Limpieza <i><small>(Autogrow)</small></i>:</label>
                    <select id="select-limpieza" multiple autocomplete="off" class="form-select"></select>
                </div>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                <button type="submit" class="btn btn-outline-success">Confirmar compra</button>
                <button type="button" class="btn btn-outline-danger">🛒</button>
            </div>
            <hr>
            <footer>
                <p id="p-footer">Trabajo realizado para TP de librerías usando Tom Select, PWD 2026. <br> Hernández,
                    Villagran, Otermin.</p>
            </footer>
        </form>
    </div>

    <!-- acá van los scripts de BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bundle.min.js"></script>

    {{-- así se incluye TOM SELECT al proyecto para darle la logica a los plugins --}}
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    <script src="{{ asset('js/js.js') }}"></script>
</body>

</html>
