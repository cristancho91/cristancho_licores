<?php
require_once "conexion.php";
class ProductosModel{

    /* =====================================================
      MOSTRAR PRODUCTOS
    ======================================================== */
    static public function mdlMostrarProductos($tabla, $item,$valor){
        if($item != null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC ");
            $stmt ->bindParam(":".$item, $valor, PDO::PARAM_STR);
    
            $stmt ->execute();
    
            return $stmt ->fetch();
        }else{
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
    
            $stmt ->execute();
    
            return $stmt ->fetchAll();
        }

        $stmt = null;
    }

    /* =====================================================
      REGISTRAR PRODUCTOS
    ======================================================== */
    static public function mdlCrearProducto($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_categoria, codigo,descripcion,imagen,stock,precio_compra,precio_venta) VALUES (:id_categoria, :codigo,:descripcion,:imagen,:stock,:precio_compra,:precio_venta) ");

        $stmt ->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_INT);
        $stmt ->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
        $stmt ->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt ->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
        $stmt ->bindParam(":stock", $datos["stock"], PDO::PARAM_INT);
        $stmt ->bindParam(":precio_compra", $datos["precio_compra"], PDO::PARAM_STR);
        $stmt ->bindParam(":precio_venta", $datos["precio_venta"], PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt = null;

    }

    /* =====================================================
      EDITAR PRODUCTOS
    ======================================================== */

    static public function mdlEditarProducto($tabla,$datos){{

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_categoria = :id_categoria, descripcion = :descripcion, imagen = :imagen, stock = :stock, precio_compra = :precio_compra, precio_venta = :precio_venta WHERE codigo = :codigo");
       
        
        $stmt ->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_INT);
        $stmt ->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
        $stmt ->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt ->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
        $stmt ->bindParam(":stock", $datos["stock"], PDO::PARAM_INT);
        $stmt ->bindParam(":precio_compra", $datos["precio_compra"], PDO::PARAM_STR);
        $stmt ->bindParam(":precio_venta", $datos["precio_venta"], PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt = null;

    }}

    /* =====================================================
      ELIMINAR PRODUCTOS
    ======================================================== */

    static public function mdleliminarProducto($tabla,$datos){
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
        $stmt -> bindParam(":id",$datos,PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt = null;
    }
}