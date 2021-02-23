<?php
require_once "../controllers/ProductoController.php";
require_once "../controllers/CategoriasController.php";
require_once "../models/ProductosModel.php";
require_once "../models/CategoriasModel.php";

class DatablesProductsAjax{

    /* =====================================================
    MOSTRAR LA TABLA DE PRODUCTOS
    ======================================================== */
    public function mostrarTablaProducts(){

        $item = null;
        $valor = null;
        $productos = ProductosController::ctrMostrarProductos($item, $valor);
       
        $datosJson = '{
            "data": [';

            for ($i=0; $i < count($productos); $i++) {

                /* =====================================================
                TRAEMOS LA IMAGEN CORRESPONDIENTE
                ======================================================== */

                if($productos[$i]["imagen"] != ""){
                    $imagen = "<img src='".$productos[$i]["imagen"]."' class='img-thumbnail' width='40px'>";
                }else{
                    $imagen = "<img src='views/img/productos/default/anonymous.png' class='img-thumbnail' width='40px'>";
                }
                /* =====================================================
                TRAEMOS LAS ACCIONES
                ======================================================== */
                $botones = "<div class='btn-group' role='group'><button class='btn btn-warning btnEditarProducto' idProducto='".$productos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarPoducto'><i class='fas fa-pencil-alt'></i></button><button class='btn btn-danger btnEliminarProducto' idProducto='".$productos[$i]["id"]."' codigo='".$productos[$i]["codigo"]."' imagen='".$productos[$i]["imagen"]."'><i class='fas fa-trash-alt'></i></button></div>";

                /* =====================================================
                TRAEMOS LA CATEGORÍA CORRESPONDIENTE
                ======================================================== */
                $item = "id";
                $valor = $productos[$i]["id_categoria"];
                $categoria = CategoriasController::ctrValidarCategoria($item,$valor);

                /* =====================================================
                CONDICIONAR EL STOCK SEGÚN LA CANTIDAD
                ======================================================== */
                if($productos[$i]["stock"] <= 10){
                    $stock = "<button class='btn btn-danger'>".$productos[$i]["stock"]."</button>";
                }else if($productos[$i]["stock"] >= 11 && $productos[$i]["stock"] <= 30){
                    $stock = "<button class='btn btn-warning'>".$productos[$i]["stock"]."</button>";
                }else{
                    $stock = "<button class='btn btn-success'>".$productos[$i]["stock"]."</button>";
                }
                
                
                $datosJson .= '[
                    "'.($i +1).'",
                    "'.$imagen.'",
                    "'.$productos[$i]["descripcion"].'",
                    "'.$productos[$i]["codigo"].'",                    
                    "'.strtoupper($categoria["categoria"]).'",
                    "'.$stock.'",
                    "$ '.$productos[$i]["precio_compra"].'",
                    "$ '.$productos[$i]["precio_venta"].'",
                    "'.$productos[$i]["fecha"].'",
                    "'.$botones.'"
                ],';
            }

            $datosJson= substr($datosJson,0,-1);

            $datosJson .= '
            ]
          }';

          echo $datosJson;
    }
}
/* =====================================================
    ACTIVAR LA TABLA DE PRODUCTOS
======================================================== */
$activarProductos = new DatablesProductsAjax();
$activarProductos->mostrarTablaProducts();