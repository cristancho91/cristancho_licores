// $.ajax({
//     url: "ajax/datablesProductsAjax.php",
//     success: function(response) {}
// });

/* =====================================================
    ACTIVAR EL PLUGIN ICHECK
======================================================== */
$('#porcentaje').iCheck({
    checkboxClass: 'icheckbox_square-blue',
    // radioClass: 'iradio_minimal',
    increaseArea: '-10%' // optional
});
$('#porcentaje2').iCheck({
    checkboxClass: 'icheckbox_square-blue',
    // radioClass: 'iradio_minimal',
    increaseArea: '-10%' // optional
});


/* =====================================================
    IDIOMA DE LA TABLA Y CARGA DE LA MISMA
======================================================== */

$('#tablaProductos').DataTable({
    "ajax": "ajax/datablesProductsAjax.php",
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
    CAPTURANDO LA CATEGORIA PARA ASIGNAR CODIGO
======================================================== */

$("#NuevaCategoriaProcto").change(function() {

    let idCategoria = $(this).val();
    let datos = new FormData();
    datos.append("idCategoria", idCategoria);

    $.ajax({
        url: "ajax/ProductosAjax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            if (!respuesta) {
                let nuevoCodigo = idCategoria + "01";
                $("#nuevoCodigo").val(nuevoCodigo);
            } else {
                let nuevoCodigo = Number(respuesta["codigo"]) + 1;
                $("#nuevoCodigo").val(nuevoCodigo);
            }


        }
    });


});

/* =====================================================
    AGREGANDO PRECIO DE VENTA
======================================================== */

$("#nuevoPrecioCompra, #editarPrecioCompra").change(function() {

    if ($(".porcentaje").prop("checked")) {
        $("#nuevoPrecioVenta").prop("readonly", true);
        let valorPorcentaje = $(".nuevoPorcentaje").val();

        let porcentaje = (Number($("#nuevoPrecioCompra").val() * valorPorcentaje / 100)) + Number($("#nuevoPrecioCompra").val());
        $("#nuevoPrecioVenta").val(porcentaje);


    }
    if ($(".porcentaje2").prop("checked")) {
        $("#editarPrecioVenta").prop("readonly", true);
        let valorPorcentaje2 = $("#editarPorcentaje").val();

        let editarporcentaje = (Number($("#editarPrecioCompra").val() * valorPorcentaje2 / 100)) + Number($("#editarPrecioCompra").val());

        $("#editarPrecioVenta").val(editarporcentaje);


    }

});


/* =====================================================
    CAMBIO DE PORCENTAJE
======================================================== */

$("#nuevoPorcentaje,#editarPorcentaje").change(function() {

    if ($("#porcentaje").prop("checked")) {
        $("#nuevoPrecioVenta").prop("readonly", true);
        let valorPorcentaje = $("#nuevoPorcentaje").val();

        let porcentaje = (Number($("#nuevoPrecioCompra").val() * valorPorcentaje / 100)) + Number($("#nuevoPrecioCompra").val());

        $("#nuevoPrecioVenta").val(porcentaje);

    }
    if ($(".porcentaje2").prop("checked")) {
        $("#editarPrecioVenta").prop("readonly", true);
        let valorPorcentaje2 = $("#editarPorcentaje").val();

        let porcentaje = (Number($("#editarPrecioCompra").val() * valorPorcentaje2 / 100)) + Number($("#editarPrecioCompra").val());

        $("#editarPrecioVenta").val(porcentaje);

    }
});


$("#porcentaje").on("ifUnchecked", function() {

    $("#nuevoPrecioVenta").prop("readonly", false);
});
$("#porcentaje").on("ifChecked", function() {

    $("#nuevoPrecioVenta").prop("readonly", true);
});

$("#porcentaje2").on("ifUnchecked", function() {
    $("#editarPrecioVenta").prop("readonly", false);
});
$("#porcentaje2").on("ifChecked", function() {
    $("#editarPrecioVenta").prop("readonly", true);
});

/* =====================================================
SUBIENDO IMAGEN DEL PRODUCTO
======================================================== */

$(".nuevaImagen").change(function() {

    let imagen = this.files[0];
    // console.log(imagen);
    /* =====================================================
    validando el tipo de imagen, que sea jpge o png
    ======================================================== */

    if (imagen["type"] != "image/png" && imagen["type"] != "image/jpeg") {

        $(".nuevaImagen").val("");

        Swal.fire({
            icon: "error",
            title: " ¡Error al subir la imagen!",
            showConfirmButton: true,
            confirmButtonText: "cerrar",
            text: "La imagen debe estar en formato PNG O JPEG"

        });

    } else if (imagen["size"] > 2000000) {

        $(".nuevaImagen").val("");

        Swal.fire({
            icon: "error",
            title: " ¡Error al subir la imagen!",
            showConfirmButton: true,
            confirmButtonText: "cerrar",
            text: "La imagen NO debe pesar más de 2MB"

        });

    } else {

        let datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on("load", function(event) {

            let rutaImagen = event.target.result;

            $(".previsualizar").attr("src", rutaImagen);


        });

    }


});


/* =====================================================
EDITAR PRODUCTO
======================================================== */

$("#tablaProductos tbody").on("click", ".btnEditarProducto", function() {

    let idProducto = $(this).attr("idProducto");
    //console.log("respuesta", idProducto);
    let datos = new FormData();
    datos.append("idProducto", idProducto);

    $.ajax({
        url: "ajax/ProductosAjax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            //console.log("respuesta", respuesta);
            let datosCategoria = new FormData();
            datosCategoria.append("idCategoria", respuesta["id_categoria"]);

            $.ajax({
                url: "ajax/CategoriasAjax.php",
                method: "POST",
                data: datosCategoria,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(respuesta) {
                    $("#editarCategoriaProducto").html(respuesta["categoria"]);
                    $("#editarCategoriaProducto").val(respuesta["id"]);

                }
            });
            $("#editarCodigo").val(respuesta["codigo"]);
            $("#editarDescripcion").val(respuesta["descripcion"]);
            $("#editarStock").val(respuesta["stock"]);
            $("#editarPrecioCompra").val(respuesta["precio_compra"]);
            $("#editarPrecioVenta").val(respuesta["precio_venta"]);


            if (respuesta["imagen"] != "") {
                $("#imagenActual").val(respuesta["imagen"]);
                $(".previsualizar").attr("src", respuesta["imagen"]);
            }

        }
    });

});

/* =====================================================
ELIMINAR PRODUCTO
======================================================== */

$("#tablaProductos tbody").on("click", ".btnEliminarProducto", function() {
    let idProducto = $(this).attr("idProducto");
    let codigo = $(this).attr("codigo");
    let imagen = $(this).attr("imagen");


    Swal.fire({
        icon: "warning",
        title: "¿Está seguro de eliminar éste producto?",
        text: "Si no lo está, puede cancelar la acción.",
        showCancelButton: true,
        showConfirmButton: true,
        confirmButtonText: "Borrar",

    }).then(function(result) {
        if (result.value) {
            window.location = "index.php?ruta=productos&idProducto=" + idProducto + "&imagen=" + imagen + "&codigo=" + codigo;
        }

    })

});