<?php

require_once "../controllers/ClientesController.php";
require_once "../models/ClientesModel.php";

class DatablesClientesAjax{

    /* =====================================================
    MOSTRAR LA TABLA DE CLIENTES
    ======================================================== */
    public function mostrarTablaClientes(){

        $item = null;
        $valor = null;
        $clientes = ClientesController::ctrMostrarClientes($item, $valor);
       
        $datosJson = '{
            "data": [';

            for ($i=0; $i < count($clientes); $i++) {

                
                /* =====================================================
                TRAEMOS LAS ACCIONES
                ======================================================== */
                $botones = "<div class='btn-group' role='group'><button class='btn btn-warning btnEditarCliente' idCliente ='".$clientes[$i]["id"]."' data-toggle='modal' data-target='#modalEditarCliente'><i class='fas fa-pencil-alt'></i></button><button class='btn btn-danger btnEliminarCliente' idCliente ='".$clientes[$i]["id"]."' documento='".$clientes[$i]["documento"]."'><i class='fas fa-trash-alt'></i></button></div>";
                
                $datosJson .= '[
                    "'.($i +1).'",
                    "'.$clientes[$i]["nombre"].'",
                    "'.$clientes[$i]["documento"].'",
                    "'.$clientes[$i]["email"].'",
                    "'.$clientes[$i]["telefono"].'",
                    "'.$clientes[$i]["direccion"].'",
                    "'.$clientes[$i]["fecha_nacimiento"].'",
                    "'.$clientes[$i]["compras"].'",
                    "17-01-1991",
                    "'.$clientes[$i]["fecha"].'",
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
    ACTIVAR LA TABLA DE CLIENTES
======================================================== */
$activarClientes = new DatablesClientesAjax();
$activarClientes->mostrarTablaClientes();