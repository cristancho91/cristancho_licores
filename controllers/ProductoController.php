<?php

class ProductosController{


    /* =====================================================
      MOSTRAR PRODUCTOS
    ======================================================== */

    static public function ctrMostrarProductos($item, $valor){

        $tabla = "productos";
        $respuesta = ProductosModel::mdlMostrarProductos($tabla, $item, $valor);

        return $respuesta;
    }

    /* =====================================================
      CREAR PRODUCTO
    ======================================================== */

    static public function ctrCrearProducto(){

      if(isset($_POST["nuevaDescripcion"])){
        echo $_POST["nuevaDescripcion"];

        if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ. ]+$/',$_POST["nuevaDescripcion"]) && 
          preg_match('/^[0-9]+$/',$_POST["nuevoStock"]) &&
          preg_match('/^[0-9.]+$/',$_POST["nuevoPrecioCompra"])&&
          preg_match('/^[0-9.]+$/',$_POST["nuevoPrecioVenta"])){

            
                /* =====================================================
                 VALIDAR IMAGEN
                ======================================================== */

                $ruta = "views/img/productos/default/anonymous.png";

                if(isset($_FILES["nuevaImagen"]["tmp_name"])){

                    list($ancho, $alto) = getimagesize($_FILES["nuevaImagen"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto = 500;


                 /* =====================================================
                 CREAMOS EL DIRECTORIO DONDE VAMOS A ALMACENAR LA IMAGEN
                ======================================================== */

                    $directorio = "views/img/productos/".$_POST["nuevoCodigo"];
                    mkdir($directorio,0755);

                    /* =====================================================
                    DE ACUERDO AL TIPO DE IMAGEN APLICAMOS EL METODO DE PHP
                    ======================================================== */

                    // PARA IMAGEN JPEG
                    if($_FILES["nuevaImagen"]["type"]=="image/jpeg"){
                        /* =====================================================
                        GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                        ======================================================== */

                        $aleatorio = mt_rand(100,999);
                        $ruta = "views/img/productos/".$_POST["nuevoCodigo"]."/".$aleatorio.".jpg";

                        $origen = imagecreatefromjpeg($_FILES["nuevaImagen"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho,$nuevoAlto);

                        imagecopyresized($destino,$origen,0,0,0,0,$nuevoAncho,$nuevoAlto,$ancho,$alto);

                        imagejpeg($destino,$ruta);

                    }

                    // PARA IMAGEN PNG
                    if($_FILES["nuevaImagen"]["type"]=="image/png"){
                        /* =====================================================
                        GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                        ======================================================== */

                        $aleatorio = mt_rand(100,999);
                        $ruta = "views/img/productos/".$_POST["nuevoCodigo"]."/".$aleatorio.".png";

                        $origen = imagecreatefrompng($_FILES["nuevaImagen"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho,$nuevoAlto);

                        imagecopyresized($destino,$origen,0,0,0,0,$nuevoAncho,$nuevoAlto,$ancho,$alto);

                        imagepng($destino,$ruta);

                    }

                }

            $tabla = "productos";
            
            $datos = array("id_categoria" => $_POST["NuevaCategoriaProcto"],
                          "codigo" =>$_POST["nuevoCodigo"],
                          "descripcion" => $_POST["nuevaDescripcion"],
                          "stock" => $_POST["nuevoStock"],
                          "precio_compra" => $_POST["nuevoPrecioCompra"],
                          "precio_venta" => $_POST["nuevoPrecioVenta"],
                          "imagen" => $ruta);

            $respuesta = ProductosModel::mdlCrearProducto($tabla,$datos);

            if($respuesta == "ok"){
              echo '<script>
              Swal.fire({
                  icon: "success",
                  title: " ¡El producto se registro satisfactoriamente!",
                  showConfirmButton: true,
                  confirmButtonText: "cerrar"

              }).then((result)=>{
                  if(result.value){
                      window.location = "productos";
                  }
              });
          </script>';
          }
            

        }else{
          echo '<script>
                Swal.fire({
                    icon: "error",
                    title: " ¡El producto no puede ir vacio o llevar caracteres especiales!",
                    showConfirmButton: true,
                    confirmButtonText: "cerrar"

                }).then((result)=>{
                    if(result.value){
                        window.location = "productos";
                    }
                });
            </script>';
        }
      }
    }

    /* =====================================================
      EDITAR PRODUCTO
    ======================================================== */

    static public function ctrEditarProductos(){

      if(isset($_POST["editarDescripcion"])){
        //echo $_POST["nuevaDescripcion"];

        if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ. ]+$/',$_POST["editarDescripcion"]) && 
          preg_match('/^[0-9]+$/',$_POST["editarStock"]) &&
          preg_match('/^[0-9.]+$/',$_POST["editarPrecioCompra"])&&
          preg_match('/^[0-9.]+$/',$_POST["editarPrecioVenta"])){

            
                /* =====================================================
                 VALIDAR IMAGEN
                ======================================================== */

                $ruta = $_POST["imagenActual"];

                if(isset($_FILES["editarImagen"]["tmp_name"]) && !empty(isset($_FILES["editarImagen"]["tmp_name"])) ){

                    list($ancho, $alto) = getimagesize($_FILES["editarImagen"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto = 500;


                 /* =====================================================
                 CREAMOS EL DIRECTORIO DONDE VAMOS A ALMACENAR LA IMAGEN
                ======================================================== */

                    $directorio = "views/img/productos/".$_POST["editarCodigo"];

                /* =====================================================
                 VERIFICAMOS SI HAY UNA IMAGEN EN LA BASE DE DATOS
                ======================================================== */
                  if(!empty($_POST["imagenActual"]) && $_POST["imagenActual"] != "views/img/productos/default/anonymous.png"){

                    unlink($_POST["imagenActual"]);

                  }else{

                    mkdir($directorio,0755);

                  }
                   

                    /* =====================================================
                    DE ACUERDO AL TIPO DE IMAGEN APLICAMOS EL METODO DE PHP
                    ======================================================== */

                    // PARA IMAGEN JPEG
                    if($_FILES["editarImagen"]["type"]=="image/jpeg"){
                        /* =====================================================
                        GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                        ======================================================== */

                        $aleatorio = mt_rand(100,999);
                        $ruta = "views/img/productos/".$_POST["editarCodigo"]."/".$aleatorio.".jpg";

                        $origen = imagecreatefromjpeg($_FILES["editarImagen"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho,$nuevoAlto);

                        imagecopyresized($destino,$origen,0,0,0,0,$nuevoAncho,$nuevoAlto,$ancho,$alto);

                        imagejpeg($destino,$ruta);

                    }

                    // PARA IMAGEN PNG
                    if($_FILES["editarImagen"]["type"]=="image/png"){
                        /* =====================================================
                        GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                        ======================================================== */

                        $aleatorio = mt_rand(100,999);
                        $ruta = "views/img/productos/".$_POST["editarCodigo"]."/".$aleatorio.".png";

                        $origen = imagecreatefrompng($_FILES["editarImagen"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho,$nuevoAlto);

                        imagecopyresized($destino,$origen,0,0,0,0,$nuevoAncho,$nuevoAlto,$ancho,$alto);

                        imagepng($destino,$ruta);

                    }

                }

            $tabla = "productos";
            
            $datos = array("id_categoria" => $_POST["editarCategoriaProducto"],
                          "codigo" =>$_POST["editarCodigo"],
                          "descripcion" => $_POST["editarDescripcion"],
                          "stock" => $_POST["editarStock"],
                          "precio_compra" => $_POST["editarPrecioCompra"],
                          "precio_venta" => $_POST["editarPrecioVenta"],
                          "imagen" => $ruta);

            $respuesta = ProductosModel::mdlEditarProducto($tabla,$datos);

            if($respuesta == "ok"){
              echo '<script>
              Swal.fire({
                  icon: "success",
                  title: " ¡El producto se actualizo satisfactoriamente!",
                  showConfirmButton: true,
                  confirmButtonText: "cerrar"

              }).then((result)=>{
                  if(result.value){
                      window.location = "productos";
                  }
              });
          </script>';
          }
            

        }else{
          echo '<script>
                Swal.fire({
                    icon: "error",
                    title: " ¡El producto no puede ir vacio o llevar caracteres especiales!",
                    showConfirmButton: true,
                    confirmButtonText: "cerrar"

                }).then((result)=>{
                    if(result.value){
                        window.location = "productos";
                    }
                });
            </script>';
        }
      }
    }



    
    /* =====================================================
    ELIMINAR PRODUCTO
    ======================================================== */

    static public function ctrEliminarProducto(){

      if(isset($_GET["idProducto"])){
          $tabla = "productos";
          $datos = $_GET["idProducto"];

          if(isset($_GET["imagen"]) != "" && $_GET["imagen"] != "views/img/productos/default/anonymous.png"){
              unlink($_GET["imagen"]);
              rmdir("views/img/productos/".$_GET["codigo"]);
          }

          $respuesta = ProductosModel::mdleliminarProducto($tabla,$datos);

          if($respuesta == "ok"){
              echo '<script>
              Swal.fire({
                  icon: "success",
                  title: " ¡El producto se Eliminó Correctamente!",
                  showConfirmButton: true,
                  confirmButtonText: "cerrar"

              }).then((result)=>{
                  if(result.value){
                      window.location = "productos";
                  }
              });
          </script>';
          }else{
              echo '<script>
                  Swal.fire({
                      icon: "error",
                      title: " ¡Error al Eliminar producto!",
                      showConfirmButton: true,
                      confirmButtonText: "cerrar"

                  }).then((result)=>{
                      if(result.value){
                          window.location = "productos";
                      }
                  });
              </script>';
          }
      }
      
  }
}