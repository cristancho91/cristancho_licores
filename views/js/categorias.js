$(function() {
    $("#tablaCategoria").DataTable({
        "responsive": true,
        "autoWidth": false,
        "paging": true,
        "language": {

            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }

        }
    });
    // $('#example2').DataTable({
    //     "paging": true,
    //     "lengthChange": false,
    //     "searching": false,
    //     "ordering": true,
    //     "info": true,
    //     "autoWidth": false,
    //     "responsive": true
    // });
});

/* =====================================================
VERIFICAR SI LA CATEGORIA EXISTE
======================================================== */

$('#nuevaCategoria').change(function() {

    $('.alert').remove();
    let categoria = $(this).val();

    let datos = new FormData();

    datos.append("validarCategoria", categoria);

    $.ajax({
        url: "ajax/CategoriasAjax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            if (respuesta) {
                $('#nuevaCategoria').parent().after('<div class="alert alert-warning" role="alert">Ésta categoría ya existe en el sistema  </div>');
                $('#nuevaCategoria').val("");
            }
        }
    })

});

/* =====================================================
EDITAR CATEGORIA
======================================================== */

$(".btnEditarCategoria").click(function() {
    let idCategoria = $(this).attr("idCategoria");

    let datos = new FormData();
    datos.append("idCategoria", idCategoria)

    $.ajax({
        url: "ajax/CategoriasAjax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $("#editarCategoria").val(respuesta["categoria"]);
            $("#idCategoria").val(respuesta["id"]);

        }
    })


});


/* =====================================================
ELIMINAR CATEGORIA
======================================================== */

$(".btnEliminarCategoria").click(function() {
    let idCategoria = $(this).attr("idCategoria");

    Swal.fire({
        icon: "warning",
        title: " ¿Está seguro de eliminar ésta categoría?",
        text: "Si no lo está, puede cancelar la acción.",
        showCancelButton: true,
        showConfirmButton: true,
        confirmButtonText: "Borrar",

    }).then(function(result) {
        if (result.value) {
            window.location = "index.php?ruta=categorias&idCategoria=" + idCategoria;
        }

    })




});