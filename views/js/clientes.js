$(function () {

    $('#nacimiento').datetimepicker({
        format: 'YYYY/MM/DD',
        locale:'es'
    });
    $('#editarNacimiento').datetimepicker({
        format: 'YYYY/MM/DD',
        locale:'es'
    });

    //Money Euro
    $('[data-mask]').inputmask()

   
});
/* =====================================================
    IDIOMA DE LA TABLA Y CARGA DE LA MISMA
======================================================== */

$('#tablaClientes').DataTable({
    "ajax": "ajax/datablesClientesAjax.php",
    "responsive": true,
    "autoWidth": false,
    "paging": true,
    "deferRender": true,
    "retrieve": true,
    "processing": true,
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

/* =====================================================
    EDITAR CLIENTE
======================================================== */
$("#tablaClientes tbody").on("click", ".btnEditarCliente", function() {

    let idCliente = $(this).attr("idCliente");
    // console.log("respuesta", idCliente);
    let datos = new FormData();
    datos.append("idCliente", idCliente);

    $.ajax({
        url: "ajax/ClientesAjax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            console.log("respuesta", respuesta);

            $("#idClient").val(respuesta["id"]);
            $("#EditarnombreCliente").val(respuesta["nombre"]);
            $("#EditarCedula").val(respuesta["documento"]);
            $("#EditarTelefono").val(respuesta["telefono"]);
            $("#EditarEmail").val(respuesta["email"]);
            $("#EditarDireccion").val(respuesta["direccion"]);
            $("#editarNacimiento").val(respuesta["fecha_nacimiento"]);
        }
    });

});

/* =====================================================
    ELIMINAR CLIENTE
======================================================== */

$("#tablaClientes tbody").on("click", ".btnEliminarCliente", function() {
    let idCliente = $(this).attr("idCliente");
    let documento = $(this).attr("documento");


    Swal.fire({
        icon: "warning",
        title: "¿Está seguro de eliminar éste Cliente?",
        text: "Si no lo está, puede cancelar la acción.",
        showCancelButton: true,
        showConfirmButton: true,
        confirmButtonText: "Borrar",

    }).then(function(result) {
        if (result.value) {
            window.location = "index.php?ruta=clientes&idCliente=" + idCliente + "&documento=" + documento;
        }

    })

});
