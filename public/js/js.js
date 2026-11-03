document.addEventListener("DOMContentLoaded", async function () {
    //para el buscador general y mostrar las fotos de los productos
    try {
        const respuesta = await fetch("/data/productos.json");
        if (!respuesta.ok) {
            throw new Error("No se encontró productos.json (HTTP " + respuesta.status + ")");
        }
        const productos = await respuesta.json();

        const opciones = productos.map(function (producto) {
            return {
                ...producto,
                id: String(producto.id)
            };
        });

        function mostrarProducto(data, escape) {
            return `<div class="producto-opcion">
                <img src="${escape(data.imagen)}" alt="" width="32" height="32">
                <span>${escape(data.nombre)}</span>
                <small>$${Number(data.precio).toLocaleString("es-AR")}</small>
            </div>`;
        }

        const configuracionBase = { //objeto js creado para no repetir codigo en cada bloque de inicialización de tom select, estos son los datos que se usan en cada selector
            valueField: "id",
            labelField: "nombre",
            searchField: ["nombre"],
            options: opciones,
            render: { option: mostrarProducto, item: mostrarProducto },
            maxItems: null
        };

        new TomSelect("#buscador-productos", {
            ...configuracionBase,
            optgroups: [
                { id: "frescos", nombre: "Frescos" },
                { id: "frutas_verduras", nombre: "Frutas y verduras" },
                { id: "carnes", nombre: "Carnes" },
                { id: "limpieza", nombre: "Limpieza" },
                { id: "almacen", nombre: "Almacén" }
            ],
            optgroupField: "categoria",
            optgroupLabelField: "nombre",
            optgroupValueField: "id",
            lockOptgroupOrder: true,
            plugins: ["optgroup_columns", "remove_button"],
            placeholder: "🔎︎ Buscá tus productos...",
            openOnFocus: true
        });

        function opcionesDe(categoria) {
            return opciones.filter(function (producto) {
                return producto.subcategoria === categoria;
            });
        }

        //acá están los otros select, se podian colocar todos juntos en un solo bloque y recorrerlo pero cada selector requiere una experiencia de usuario y un conjunto de plugins específicos entonces separarlos nos permitió personalizar el comportamiento de forma individual, por lo que ponerlos individuales es una decisión de diseño

        new TomSelect("#select-frescos", {
            ...configuracionBase,
            options: opcionesDe("frescos"),
            plugins: ["remove_button", "drag_drop"]
        });

        new TomSelect("#select-almacen", {
            ...configuracionBase,
            options: opcionesDe("almacen"),
            plugins: ["clear_button"]
        });

        new TomSelect("#select-verduras", {
            ...configuracionBase,
            options: opcionesDe("verduras"),
            plugins: {
                'checkbox_options': {
                    'checkedClassNames': ['ts-checked'],
                    'uncheckedClassNames': ['ts-unchecked'],
                }
            },
        });

        new TomSelect("#select-frutas", {
            ...configuracionBase,
            options: opcionesDe("frutas"),
            plugins: {
                'dropdown_header': {
                    title: 'Este es el HEADER de frutas'
                }
            }
        });

        new TomSelect("#select-carnes", {
            ...configuracionBase,
            options: opcionesDe("carnes"),
            plugins: ["remove_button", "restore_on_backspace"] //este plugin hace que al presionar la tecla Backspace para eliminar un elemento seleccionado, el texto de dicho elemento se vuelva a colocar dentro del campo de entrada (input) para que se pueda editar en lugar de borrarlo por completo
        });

        new TomSelect("#select-limpieza", {
            ...configuracionBase,
            options: opcionesDe("limpieza"),
            plugins: ["remove_button", "input_autogrow"]
        });

    } catch (error) {
        console.error("Error al cargar los productos:", error);
    }
});
