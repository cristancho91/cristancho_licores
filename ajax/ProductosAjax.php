<?php

require_once "../controllers/ProductoController.php";
require_once "../models/ProductosModel.php";

class ProductosAjax{

    /* =====================================================
    CREAMOS CODIGO DEL PRODUCTO apartir de idCategoria
    ======================================================== */
    public $idCategoria;
    public function crearCodigoProducto(){

        $item = "id_categoria";
        $valor = $this->idCategoria;

        $respuesta = ProductosController::ctrMostrarProductos($item,$valor);

        echo json_encode($respuesta);


    }

    /* =====================================================
    EDITAR PRODUCTO
    ======================================================== */
    public $idProducto;

    public function ajaxEditarProducto(){
        $item = "id";
        $valor = $this-> idProducto;
        $respuesta = ProductosController::ctrMostrarProductos($item, $valor);

        echo json_encode($respuesta);
    }
}

/* =====================================================
CREAMOS CODIGO DEL PRODUCTO apartir de idCategoria
======================================================== */
if(isset($_POST["idCategoria"])){

    $codigoProducto = new ProductosAjax();
    $codigoProducto -> idCategoria = $_POST["idCategoria"];
    $codigoProducto->crearCodigoProducto();
}

/* =====================================================
EDITAR PRODUCTO
======================================================== */

if(isset($_POST["idProducto"])){

    $editarproducto = new ProductosAjax();
    $editarproducto ->idProducto = $_POST["idProducto"];
    $editarproducto ->ajaxEditarProducto();
}