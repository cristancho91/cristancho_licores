<?php

require_once "../controllers/ClientesController.php";
require_once "../models/ClientesModel.php";

class ClientesAjax{

    /* =====================================================
    EDITAR CLIENTE
    ======================================================== */

    public $idCliente;

    public function editarClienteAjax(){
        $item = "id";
        $valor = $this ->idCliente;

        $respuesta = ClientesController::ctrMostrarClientes($item, $valor);
        echo json_encode($respuesta);
    }
}


/* =====================================================
EDITAR CLIENTE
======================================================== */

if(isset($_POST["idCliente"])){

    $cliente = new ClientesAjax();
    $cliente ->idCliente = $_POST["idCliente"];
    $cliente -> editarClienteAjax();

}