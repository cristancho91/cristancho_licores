
<?php

class CategoriasController{


    /* =====================================================
    CREAR CATEGORÍA
    ======================================================== */

    static public function ctrCrearCategoria(){

        if(isset($_POST["nuevaCategoria"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',$_POST["nuevaCategoria"])){

                $tabla = "categorias";
                $datos = $_POST["nuevaCategoria"];

                $respuesta = CategoriasModel::mdlCrearCategoria($tabla,$datos);

                if($respuesta == "ok"){
                    echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: " ¡La categoría se guardo correctamente!",
                            showConfirmButton: true,
                            confirmButtonText: "cerrar"
        
                        }).then((result)=>{
                            if(result.value){
                                window.location = "categorias";
                            }
                        });
                    </script>';
                }

            }else{

                echo '<script>
                            Swal.fire({
                                icon: "error",
                                title: " ¡La categoría no puede ir vacia o lleva caracteres especiales!",
                                showConfirmButton: true,
                                confirmButtonText: "cerrar"
            
                            }).then((result)=>{
                                if(result.value){
                                    window.location = "categorias";
                                }
                            });
                        </script>';

            }
        }

    }

    /* =====================================================
    VERIFICAR SI LA CATEGORÍA EXISTE y MOSTRAR CATEGORIAS
    ======================================================== */

    static public function ctrValidarCategoria($item, $valor){

        $tabla = "categorias";
        $respuesta = CategoriasModel::mdlValidarCategorias($tabla, $item, $valor);

        return $respuesta;
    }

    /* =====================================================
    EDITAR CATEGORIA
    ======================================================== */

    static public function ctrEditarCategoria(){

        if(isset($_POST["editarCategoria"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',$_POST["editarCategoria"])){

                $tabla = "categorias";
                $datos =array("categoria" =>$_POST["editarCategoria"],
                            "id"=>$_POST["idCategoria"]) ;

                $respuesta = CategoriasModel::mdlEditarCategoria($tabla,$datos);

                if($respuesta == "ok"){
                    echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: " ¡La categoría se Actualizó correctamente!",
                            showConfirmButton: true,
                            confirmButtonText: "cerrar"
        
                        }).then((result)=>{
                            if(result.value){
                                window.location = "categorias";
                            }
                        });
                    </script>';
                }

            }else{

                echo '<script>
                            Swal.fire({
                                icon: "error",
                                title: " ¡La categoría no puede ir vacia o lleva caracteres especiales!",
                                showConfirmButton: true,
                                confirmButtonText: "cerrar"
            
                            }).then((result)=>{
                                if(result.value){
                                    window.location = "categorias";
                                }
                            });
                        </script>';

            }
        }
    }

    /* =====================================================
    ELIMINAR CATEGORÍA
    ======================================================== */

    static public function ctrEliminarCategoria(){
        if(isset($_GET["idCategoria"])){

            $tabla = "categorias";
            $datos = $_GET["idCategoria"];

            $respuesta = CategoriasModel::mdlEliminarCategoria($tabla,$datos);

            if($respuesta == "ok"){
                echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: " ¡La categoría se eliminó correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "cerrar"
    
                    }).then((result)=>{
                        if(result.value){
                            window.location = "categorias";
                        }
                    });
                </script>';
            }

        }
    }
}