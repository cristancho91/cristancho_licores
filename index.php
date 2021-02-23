<?php

require_once "controllers/PlantillaController.php";
require_once "controllers/CategoriasController.php";
require_once "controllers/UsuariosController.php";
require_once "controllers/ProductoController.php";
require_once "controllers/ClientesController.php";
require_once "controllers/VentasController.php";

require_once "models/CategoriasModel.php";
require_once "models/UsuariosModel.php";
require_once "models/ProductosModel.php";
require_once "models/ClientesModel.php";
require_once "models/VentasModel.php";

$plantilla = new PlantillaController();

$plantilla -> ctrPlantilla();