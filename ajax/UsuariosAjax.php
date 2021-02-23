<?php

require_once "../controllers/UsuariosController.php";
require_once "../models/UsuariosModel.php";

class UsuariosAjax{

    /* =====================================================
    EDITAR USUARIO
    ======================================================== */
    public $idUsuario;

    public function ajaxEditarUser(){
        $item = "id";
        $valor = $this-> idUsuario;
        $respuesta = UsuariosController::ctrMostrarUser($item, $valor);

        echo json_encode($respuesta);
    }



    /* =====================================================
    ACTIVAR USUARIO
    ======================================================== */

    public $activarUser;
    public $activarId;

    public function activarUserAjax(){
        $tabla = "usuarios";
        $item1 = "estado";
        $item2 ="id";
        $valor1 = $this->activarUser;
        $valor2 = $this->activarId;
        $respuesta = UsuariosModel::mdlActualizarUser($tabla, $item1, $valor1,$item2, $valor2);
    }
    /* =====================================================
    VERIFICAR SI EL USUARIO EXISTE
    ======================================================== */
    public $validarUser;

    public function validateUserAjax(){
        $item = "usuario";
        $valor = $this-> validarUser;
        $respuesta = UsuariosController::ctrMostrarUser($item, $valor);

        echo json_encode($respuesta);
    }

}



/* =====================================================
EDITAR USUARIO
======================================================== */

if(isset($_POST["idUser"])){

    $editar = new UsuariosAjax();
    $editar ->idUsuario = $_POST["idUser"];
    $editar ->ajaxEditarUser();
}

/* =====================================================
ACTIVAR USUARIO
======================================================== */
if(isset($_POST["activarUser"])){
    $activarUser = new UsuariosAjax();
    $activarUser -> activarUser = $_POST["activarUser"];
    $activarUser -> activarId = $_POST["activarId"];
    $activarUser ->activarUserAjax();

}

/* =====================================================
VERIFICAR SI EL USUARIO EXISTE
======================================================== */
if(isset($_POST["validarUser"])){
    $valUser = new UsuariosAjax();
    $valUser -> validarUser = $_POST["validarUser"];
    $valUser ->validateUserAjax();

}
