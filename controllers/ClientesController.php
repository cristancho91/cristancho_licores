
<?php

class ClientesController{

    /* =====================================================
    MOSTRAR LA TABLA DE CLIENTES
    ======================================================== */

    static public function ctrMostrarClientes($item, $valor){
        $tabla = "clientes";

        $respuesta = ClientesModel::mdlMostrarClientes($tabla, $item, $valor);

        return $respuesta;

    }

    /* =====================================================
    CREAR cliente
    ======================================================== */
    static public function ctrCrearCliente(){
        if(isset($_POST["nombreCliente"])){
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',$_POST["nombreCliente"]) &&
                preg_match('/^[0-9]+$/',$_POST["cedula"]) &&
                preg_match('/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/',$_POST["email"]) &&
                preg_match('/^[()\-0-9 ]+$/',$_POST["telefono"]) &&
                preg_match('/^[#\.\-a-zA-Z0-9 ]+$/',$_POST["direccion"])) {

                    $tabla = "clientes";

                    $datos = array("nombre" => $_POST["nombreCliente"],
                                    "cedula" => $_POST["cedula"],
                                    "email" =>$_POST["email"],
                                    "telefono"=>$_POST["telefono"],
                                    "direccion" =>$_POST["direccion"],
                                    "fecha_nacimiento" =>$_POST["nacimiento"]);
                    
                    $respuesta = ClientesModel::mdlCrearCliente($tabla,$datos);

                    if($respuesta == "ok"){
                        echo '<script>
                            Swal.fire({
                                icon: "success",
                                title: " ¡El cliente se creó correctamente!",
                                showConfirmButton: true,
                                confirmButtonText: "cerrar"
            
                            }).then((result)=>{
                                if(result.value){
                                    window.location = "clientes";
                                }
                            });
                        </script>';
                    }

                
            } else {
                echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: " ¡El cliente no puede ir vacio o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "cerrar"

                    }).then((result)=>{
                        if(result.value){
                            window.location = "clientes";
                        }
                    });
                </script>';
            }
            
        }
    }
    /* =====================================================
    EDITAR cliente
    ======================================================== */
    static public function ctreditarCliente(){
        if(isset($_POST["EditarnombreCliente"])){
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',$_POST["EditarnombreCliente"]) &&
                preg_match('/^[0-9]+$/',$_POST["EditarCedula"]) &&
                preg_match('/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/',$_POST["EditarEmail"]) &&
                preg_match('/^[()\-0-9 ]+$/',$_POST["EditarTelefono"]) &&
                preg_match('/^[#\.\-a-zA-Z0-9 ]+$/',$_POST["EditarDireccion"])) {

                    $tabla = "clientes";

                    $datos = array("id" => $_POST["idClient"],
                                    "nombre" => $_POST["EditarnombreCliente"],
                                    "cedula" => $_POST["EditarCedula"],
                                    "email" =>$_POST["EditarEmail"],
                                    "telefono"=>$_POST["EditarTelefono"],
                                    "direccion" =>$_POST["EditarDireccion"],
                                    "fecha_nacimiento" =>$_POST["editarNacimiento"]);
                    
                    $respuesta = ClientesModel::mdlEditarrCliente($tabla,$datos);

                    if($respuesta == "ok"){
                        echo '<script>
                            Swal.fire({
                                icon: "success",
                                title: " ¡El cliente se Actualizó correctamente!",
                                showConfirmButton: true,
                                confirmButtonText: "cerrar"
            
                            }).then((result)=>{
                                if(result.value){
                                    window.location = "clientes";
                                }
                            });
                        </script>';
                    }

                
            } else {
                echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: " ¡El cliente no puede ir vacio o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "cerrar"

                    }).then((result)=>{
                        if(result.value){
                            window.location = "clientes";
                        }
                    });
                </script>';
            }
            
        }
    }

    /* =====================================================
    ELIMINAR cliente
    ======================================================== */
    static public function ctrEliminarCliente(){
        if(isset($_GET["idCliente"])){
            $tabla = "clientes";
            $datos = $_GET["idCliente"];

            $respuesta= ClientesModel::mdlEliminarCliente($tabla, $datos);

            if($respuesta == "ok"){
                echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: " ¡El cliente se Eliminó correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "cerrar"
    
                    }).then((result)=>{
                        if(result.value){
                            window.location = "clientes";
                        }
                    });
                </script>';
            }

        }
    }
}