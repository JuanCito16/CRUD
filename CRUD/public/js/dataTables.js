$(document).ready(function() {
    $('#miTabla').DataTable({
        searching: false,
        lengthChange: false,
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/Spanish.json",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "infoEmpty": "Mostrando 0 a 0 de 0 registros",
            "infoFiltered": "(filtrado de _MAX_ registros en total)",
            "emptyTable": "No hay datos disponibles en la tabla",
            "paginate": {
                "previous": "Anterior",
                "next": "Siguiente" 
            }
        }
    });
});
