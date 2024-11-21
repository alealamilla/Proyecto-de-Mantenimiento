var table = undefined;
$(document).ready(function () {
    table = $('#table').DataTable({
        ajax: route('receptions.follows'),
        responsive: true,
        // Establecer la columna 'next_reception' como la columna para ordenar inicialmente
        order: [[3, 'asc']], // La columna 3 es 'next_reception' (0-based index)
        columns: [
            {
                // Formatear 'reception_date' para mostrar solo la fecha
                data: 'reception_date',
                render: function (data) {
                    return formatDate(data);
                }
            },
            {
                data: null,
                render: function (data) {
                    return data.owner ? data.owner.name : '';
                }
            },
            {
                data: null,
                render: function (data) {
                    return data.car ? data.car.placas : '';
                }
            },
            {
                // Formatear 'next_reception' para mostrar solo la fecha y permitir ordenamiento
                data: 'next_reception',
                render: function (data) {
                    return formatDate(data);
                }
            },
            {
                data: null,
                render: function (data) {
                    return data.owner ? data.owner.phone : '';
                }
            },
        ],
        // Especificar que la columna 'next_reception' es de tipo fecha
        columnDefs: [
            {
                targets: 3, // Índice de la columna 'next_reception'
                type: 'date', // Define la columna como tipo fecha
            }
        ]
    });
});

// Función para formatear la fecha y mostrar solo el componente de fecha
function formatDate(dateString) {
    if (!dateString) return '';
    var date = new Date(dateString);
    // Extraer la fecha en formato YYYY-MM-DD
    return date.toISOString().split('T')[0];
}
