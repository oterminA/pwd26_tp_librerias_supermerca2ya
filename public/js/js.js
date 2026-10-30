document.addEventListener("DOMContentLoaded", function () {
    //////para el buscador con listas

    ///COMENTARIO DE CARO: falta la logica para que se vean los elementos que tenemos en el json pero para poder armar el formulario tuve que poner esto acá que es el ejemplo que da tom select
    new TomSelect("#buscador-productos", {
        options: [
            { id: 'avenger', make: 'dodge', model: 'Avenger' },
            { id: 'caliber', make: 'dodge', model: 'Caliber' },
            { id: 'caravan-grand-passenger', make: 'dodge', model: 'Caravan Grand Passenger' },
            { id: 'challenger', make: 'dodge', model: 'Challenger' },
            { id: 'ram-1500', make: 'dodge', model: 'Ram 1500' },
            { id: 'viper', make: 'dodge', model: 'Viper' },
            { id: 'a3', make: 'audi', model: 'A3' },
            { id: 'a6', make: 'audi', model: 'A6' },
            { id: 'r8', make: 'audi', model: 'R8' },
            { id: 'rs-4', make: 'audi', model: 'RS 4' },
            { id: 's4', make: 'audi', model: 'S4' },
            { id: 's8', make: 'audi', model: 'S8' },
            { id: 'tt', make: 'audi', model: 'TT' },
            { id: 'avalanche', make: 'chevrolet', model: 'Avalanche' },
            { id: 'aveo', make: 'chevrolet', model: 'Aveo' },
            { id: 'cobalt', make: 'chevrolet', model: 'Cobalt' },
            { id: 'silverado', make: 'chevrolet', model: 'Silverado' },
            { id: 'suburban', make: 'chevrolet', model: 'Suburban' },
            { id: 'tahoe', make: 'chevrolet', model: 'Tahoe' },
            { id: 'trail-blazer', make: 'chevrolet', model: 'TrailBlazer' },
        ],
        // esto indica las categorias que tenemos que tener: almacen, limpieza, etc
        optgroups: [
            { $order: 3, id: 'dodge', name: 'Dodge' },
            { $order: 2, id: 'audi', name: 'Audi' },
            { $order: 1, id: 'chevrolet', name: 'Chevrolet' }
        ],
        labelField: 'model',
        valueField: 'id',
        optgroupField: 'make',
        optgroupLabelField: 'name',
        optgroupValueField: 'id',
        lockOptgroupOrder: true,
        searchField: ['model'],
        plugins: ['optgroup_columns, remove_button'], //acá se hizo combinación de PLUGINS!
        openOnFocus: false
    });

    //////para los demás select

new TomSelect('#select-frescos', {
        plugins: ['remove_button', 'drag_drop'] //acá se hizo combinación de PLUGINS!
    });

    new TomSelect('#select-almacen', {
        plugins: ['clear_button']
    });

    new TomSelect('#select-verduras', {
        plugins: ['remove_button', 'checkbox_options']//acá se hizo combinación de PLUGINS!
    });

    new TomSelect('#select-frutas', {
        plugins: ['dropdown_header'],
        dropdownHeader: { title: 'Seleccioná una fruta' }
    });

    new TomSelect('#select-carnes', {
        plugins: ['remove_button', 'restore_on_backspace'] //acá se hizo combinación de PLUGINS!
    });

    new TomSelect('#select-limpieza', {
        plugins: ['remove_button', 'autogrow'] //acá se hizo combinación de PLUGINS!
    });
});
