<?php

require_once "../controllers/CategoriasController.php";
require_once "../models/CategoriasModel.php";

class CategoriasAjax{

    /* =====================================================
    VERIFICAR SI LA CATEGORÍA EXISTE
    ======================================================== */
    public $validarCategoria;

    public function validarCategoriaAjax(){
        $item = "categoria";
        $valor = $this-> validarCategoria;
        $respuesta = CategoriasController::ctrValidarCategoria($item, $valor);

        echo json_encode($respuesta);
    }


    /* =====================================================
    EDITAR CATEGORÍAs
    ======================================================== */

    public $idCategoria;
    public function editarCategoriaAjax(){
        $item = "id";
        $valor = $this-> idCategoria;
        $respuesta = CategoriasController::ctrValidarCategoria($item, $valor);
        echo json_encode($respuesta);
    }

}


/* =====================================================
VERIFICAR SI LA CATEGORÍA EXISTE
======================================================== */
if(isset($_POST["validarCategoria"])){
    $valCat = new CategoriasAjax();
    $valCat -> validarCategoria = $_POST["validarCategoria"];
    $valCat ->validarCategoriaAjax();

}

/* =====================================================
EDITAR CATEGORÍAs
======================================================== */
if(isset($_POST["idCategoria"])){
    $categoria = new CategoriasAjax();
    $categoria -> idCategoria = $_POST["idCategoria"];
    $categoria ->editarCategoriaAjax();

}