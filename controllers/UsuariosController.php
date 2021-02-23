<?php

class UsuariosController{

/* =====================================================
      LOGIN DE USUARIOS
 ======================================================== */

    static public function ctrIngresoUsuer(){

        if(isset($_POST["IngUser"])){

            if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["IngUser"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["IngPassword"]) ){
                
                $decriptar = crypt($_POST["IngPassword"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $tabla = "usuarios";
                $item = "usuario";
                $valor = $_POST["IngUser"];
                $respuesta = UsuariosModel::mdlMostrarUsuarios($tabla, $item, $valor);
                
                // var_dump($respuesta);
                if(!$respuesta){
                    echo '<br><div class="alert alert-danger" role="alert">Error al Ingresar al sistema, vuelve a intentarlo </div>';
                }else{

                    if($respuesta["usuario"]==$_POST["IngUser"] && $respuesta["password"]== $decriptar){

                        if($respuesta["estado"] == 1 ){
                            $_SESSION["login"]= "ok";
                            $_SESSION["id"] = $respuesta["id"];
                            $_SESSION["nombre"] = $respuesta["nombre"];
                            $_SESSION["usuario"] = $respuesta["usuario"];
                            $_SESSION["perfil"] = $respuesta["perfil"];
                            $_SESSION["foto"] = $respuesta["foto"];
                            $_SESSION["estado"] = $respuesta["estado"];
                            $_SESSION["ultimo_login"] = $respuesta["ultimo_login"];
                            /* =====================================================
                                REGISTRAR FECHA PARA SABER EL ULTIMO LOGIN
                            ======================================================== */
                            date_default_timezone_set('America/Bogota');
                            $fecha = date('Y-m-d');
                            $hora = date('H:i:s');
                            $fechaActual = $fecha.' '.$hora;

                            $item1 = "ultimo_login";
                            $valor1 = $fechaActual;
                            $item2 = "id";
                            $valor2 = $respuesta["id"];

                            $ultimoLogin = UsuariosModel::mdlActualizarUser($tabla,$item1,$valor1,$item2,$valor2);

                            if($ultimoLogin == "ok"){

                                echo '<script>
                                window.location = "inicio";
                                </script>';

                            }
                            
                        }else{
                            echo '<br><div class="alert alert-danger" role="alert">Error al Ingresar, El usuario aún NO ha sido activado </div>';
                        }
                        
                        
                    }else{
                        echo '<br><div class="alert alert-danger" role="alert">Error al Ingresar al sistema, vuelve a intentarlo </div>';
                    }
                }
                
            }

        }
    }
/* =====================================================
      REGISTRO DE USUARIOS
 ======================================================== */

 static public function ctrCrearUser(){

    if(isset($_POST["nuevoUser"])){

        if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',$_POST["nuevoNombre"]) &&
            preg_match('/^[a-zA-Z0-9]+$/',$_POST["nuevoUser"]) &&
            preg_match('/^[a-zA-Z0-9]+$/',$_POST["nuevaPassword"])){

                /* =====================================================
                 VALIDAR IMAGEN
                ======================================================== */

                $ruta = "";
                if(isset($_FILES["nuevaFoto"]["tmp_name"])){

                    list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto = 500;


                 /* =====================================================
                 CREAMOS EL DIRECTORIO DONDE VAMOS A ALMACENAR LA IMAGEN
                ======================================================== */

                    $directorio = "views/img/usuarios/".$_POST["nuevoUser"];
                    mkdir($directorio,0755);

                    /* =====================================================
                    DE ACUERDO AL TIPO DE IMAGEN APLICAMOS EL METODO DE PHP
                    ======================================================== */

                    // PARA IMAGEN JPEG
                    if($_FILES["nuevaFoto"]["type"]=="image/jpeg"){
                        /* =====================================================
                        GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                        ======================================================== */

                        $aleatorio = mt_rand(100,999);
                        $ruta = "views/img/usuarios/".$_POST["nuevoUser"]."/".$aleatorio.".jpg";

                        $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho,$nuevoAlto);

                        imagecopyresized($destino,$origen,0,0,0,0,$nuevoAncho,$nuevoAlto,$ancho,$alto);

                        imagejpeg($destino,$ruta);

                    }

                    // PARA IMAGEN PNG
                    if($_FILES["nuevaFoto"]["type"]=="image/png"){
                        /* =====================================================
                        GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                        ======================================================== */

                        $aleatorio = mt_rand(100,999);
                        $ruta = "views/img/usuarios/".$_POST["nuevoUser"]."/".$aleatorio.".png";

                        $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho,$nuevoAlto);

                        imagecopyresized($destino,$origen,0,0,0,0,$nuevoAncho,$nuevoAlto,$ancho,$alto);

                        imagepng($destino,$ruta);

                    }

                }

                $tabla = "usuarios";

                $encriptar = crypt($_POST["nuevaPassword"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');


                $datos = array("nombre" =>$_POST["nuevoNombre"],
                                "usuario" =>$_POST["nuevoUser"],
                                "password" =>$encriptar,
                                "perfil" =>$_POST["nuevoPerfil"],
                                "ruta" => $ruta);
                
                $respuesta = UsuariosModel::mdlIngresarUser($tabla,$datos);

                if($respuesta == "ok"){
                    echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: " ¡El usuario se registro satisfactoriamente!",
                        showConfirmButton: true,
                        confirmButtonText: "cerrar"
    
                    }).then((result)=>{
                        if(result.value){
                            window.location = "usuarios";
                        }
                    });
                </script>';
                }


        }else{
            echo '<script>
                Swal.fire({
                    icon: "error",
                    title: " ¡El usuario no puede ir vacio o llevar caracteres especiales!",
                    showConfirmButton: true,
                    confirmButtonText: "cerrar"

                }).then((result)=>{
                    if(result.value){
                        window.location = "usuarios";
                    }
                });
            </script>';
        }

    }

 }

 
/* =====================================================
      MOSTRAR USUARIOS
 ======================================================== */
    static public function ctrMostrarUser($item,$valor){
        $tabla = "usuarios";
        $respuesta = UsuariosModel::mdlMostrarUsuarios($tabla, $item, $valor);

        return $respuesta;
    }

/* =====================================================
      EDITAR USUARIOS
 ======================================================== */
    static public function ctrEditarUser(){

        if(isset($_POST["editarUser"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',$_POST["editarNombre"])){
                /* =====================================================
                 VALIDAR IMAGEN
                ======================================================== */

                $ruta = $_POST["fotoActual"];

                if(isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])){

                    list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto = 500;


                    /* =====================================================
                    CREAMOS EL DIRECTORIO DONDE VAMOS A ALMACENAR LA IMAGEN
                    ======================================================== */

                    $directorio = "views/img/usuarios/".$_POST["editarUser"];

                    /* =====================================================
                    PRIMERO PREGUNTAMOS SI EXISTE UNA FOTO EN LA BASE DE DATOS
                    ======================================================== */

                    if(!empty($_POST["fotoActual"])){

                        unlink($_POST["fotoActual"]);

                    }else{

                        mkdir($directorio,0755);

                    }

                    /* =====================================================
                    DE ACUERDO AL TIPO DE IMAGEN APLICAMOS EL METODO DE PHP
                    ======================================================== */

                    // PARA IMAGEN JPEG
                    if($_FILES["editarFoto"]["type"]=="image/jpeg"){
                        /* =====================================================
                        GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                        ======================================================== */

                        $aleatorio = mt_rand(100,999);
                        $ruta = "views/img/usuarios/".$_POST["editarUser"]."/".$aleatorio.".jpg";

                        $origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho,$nuevoAlto);

                        imagecopyresized($destino,$origen,0,0,0,0,$nuevoAncho,$nuevoAlto,$ancho,$alto);

                        imagejpeg($destino,$ruta);

                    }

                    // PARA IMAGEN PNG
                    if($_FILES["editarFoto"]["type"]=="image/png"){
                        /* =====================================================
                        GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                        ======================================================== */

                        $aleatorio = mt_rand(100,999);
                        $ruta = "views/img/usuarios/".$_POST["editarUser"]."/".$aleatorio.".png";

                        $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho,$nuevoAlto);

                        imagecopyresized($destino,$origen,0,0,0,0,$nuevoAncho,$nuevoAlto,$ancho,$alto);

                        imagepng($destino,$ruta);

                    }

                }

                $tabla = "usuarios";

                if($_POST["editarPassword"] != ""){

                    if(preg_match('/^[a-zA-Z0-9]+$/',$_POST["editarPassword"])){

                        $encriptar = crypt($_POST["editarPassword"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');



                    }else{
                        echo '<script>
                            Swal.fire({
                                icon: "error",
                                title: " ¡La contraseña no puede ir vacio o llevar caracteres especiales!",
                                showConfirmButton: true,
                                confirmButtonText: "cerrar"
            
                            }).then((result)=>{
                                if(result.value){
                                    window.location = "usuarios";
                                }
                            });
                        </script>';
                    }

                    
                }else{
                    $encriptar = $_POST["passwordActual"];
                }

                $datos = array("nombre" =>$_POST["editarNombre"],
                "usuario" =>$_POST["editarUser"],
                "password" =>$encriptar,
                "perfil" =>$_POST["editarPerfil"],
                "ruta" => $ruta);

                $respuesta = UsuariosModel::mdlEditarUser($tabla,$datos);
                if($respuesta == "ok"){
                    echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: " ¡El usuario se editó satisfactoriamente!",
                        showConfirmButton: true,
                        confirmButtonText: "cerrar"
    
                    }).then((result)=>{
                        if(result.value){
                            window.location = "usuarios";
                        }
                    });
                </script>';
                }
            }else{
                echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: " ¡El nombre no puede ir vacio o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "cerrar"

                    }).then((result)=>{
                        if(result.value){
                            window.location = "usuarios";
                        }
                    });
                </script>';
            }
        }
    }


    /* =====================================================
    BORRAR USUARIOS
    ======================================================== */

    static public function ctrBorrarUser(){

        if(isset($_GET["idUser"])){
            $tabla = "usuarios";
            $datos = $_GET["idUser"];

            if(isset($_GET["fotoUser"]) != ""){
                unlink($_GET["fotoUser"]);
                rmdir("views/img/usuarios/".$_GET["usuario"]);
            }

            $respuesta = UsuariosModel::mdlBorrarUser($tabla,$datos);

            if($respuesta == "ok"){
                echo '<script>
                Swal.fire({
                    icon: "success",
                    title: " ¡El usuario se Eliminó Correctamente!",
                    showConfirmButton: true,
                    confirmButtonText: "cerrar"

                }).then((result)=>{
                    if(result.value){
                        window.location = "usuarios";
                    }
                });
            </script>';
            }else{
                echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: " ¡Error al Eliminar Usuario!",
                        showConfirmButton: true,
                        confirmButtonText: "cerrar"

                    }).then((result)=>{
                        if(result.value){
                            window.location = "usuarios";
                        }
                    });
                </script>';
            }
        }
        
    }


}