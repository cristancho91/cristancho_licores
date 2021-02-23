/* =====================================================
SUBIENDO LA FOTO DEL USUARIO
======================================================== */

$(".nuevaFoto").change(function() {

    let imagen = this.files[0];
    // console.log(imagen);
    /* =====================================================
    validando el tipo de imagen, que sea jpge o png
    ======================================================== */

    if (imagen["type"] != "image/png" && imagen["type"] != "image/jpeg") {

        $(".nuevaFoto").val("");

        Swal.fire({
            icon: "error",
            title: " ¡Error al subir la imagen!",
            showConfirmButton: true,
            confirmButtonText: "cerrar",
            text: "La imagen debe estar en formato PNG O JPEG"

        });

    } else if (imagen["size"] > 2000000) {

        $(".nuevaFoto").val("");

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
EDITAR USUARIO
======================================================== */

$(document).on("click", ".btnEditarUsuario", function() {

    let idUsuario = $(this).attr("idUser");

    let datos = new FormData();
    datos.append("idUser", idUsuario);

    $.ajax({
        url: "ajax/UsuariosAjax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            console.log("respuesta", respuesta);
            $("#editarNombre").val(respuesta["nombre"]);
            $("#editarUser").val(respuesta["usuario"]);
            $("#editarPerfil").html(respuesta["perfil"]);
            $("#editarPerfil").val(respuesta["perfil"]);
            $("#fotoActual").val(respuesta["foto"]);

            $("#passwordActual").val(respuesta["password"]);

            if (respuesta["foto"] != "") {

                $(".previsualizar").attr("src", respuesta["foto"]);
            }

        }
    });

});
/* =====================================================
CAMBIAR ESTADO DEL USUARIO
======================================================== */
$(document).on("click", ".btnActivar", function() {

    let idUser = $(this).attr("idUser");
    let stateUser = $(this).attr("stateUser");

    let datos = new FormData();
    datos.append("activarId", idUser);
    datos.append("activarUser", stateUser);

    $.ajax({
        url: "ajax/UsuariosAjax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

        }
    })
    if (window.matchMedia("(max-width:767px)").matches) {
        Swal.fire({
            icon: "success",
            title: " ¡El usuario se actualizó!",
            showConfirmButton: true,
            confirmButtonText: "cerrar"

        }).then(function(result) {
            if (result.value) {
                window.location = "usuarios";
            }
        });


    }

    if (stateUser == 0) {

        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('stateUser', 1);
    } else {
        $(this).removeClass('btn-danger');
        $(this).addClass('btn-success');
        $(this).html('Activado');
        $(this).attr('stateUser', 0);
    }
});

/* =====================================================
VERIFICAR SI EL USUARIO EXISTE
======================================================== */

$('#nuevoUser').change(function() {

    $('.alert').remove();
    let usuario = $(this).val();

    let datos = new FormData();

    datos.append("validarUser", usuario);

    $.ajax({
        url: "ajax/UsuariosAjax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            if (respuesta) {
                $('#nuevoUser').parent().after('<div class="alert alert-warning" role="alert">Este Usuario ya existe en el sistema  </div>');
                $('#nuevoUser').val("");
            }
        }
    })

});

/* =====================================================
ELIMINAR USUARIO
======================================================== */

$(document).on("click", ".btnEliminarUser", function() {

    let idUser = $(this).attr("idUser");
    let fotoUser = $(this).attr("fotoUser");
    let usuario = $(this).attr("usuario");
    Swal.fire({
        icon: "warning",
        title: " ¿Está seguro de eliminar éste usuario?",
        text: "Si no lo está, puede cancelar la acción.",
        showCancelButton: true,
        showConfirmButton: true,
        confirmButtonText: "Borrar",

    }).then(function(result) {
        if (result.value) {
            window.location = "index.php?ruta=usuarios&idUser=" + idUser + "&fotoUser=" + fotoUser + "&usuario=" + usuario;
        }

    })

});