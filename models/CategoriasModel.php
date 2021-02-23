<?php

require_once "conexion.php";
class CategoriasModel{

    /* =====================================================
    CREAR CATEGORÍA
    ======================================================== */

    static public function mdlCrearCategoria($tabla,$datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(categoria) VALUES(LOWER(:categoria))");
        $stmt->bindParam(":categoria",$datos, PDO::PARAM_STR);
        
        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt = null;
    }

    /* =====================================================
    VERIFICAR SI LA CATEGORÍA EXISTE y MOSTRAR CATEGORIAS
    ======================================================== */

    static public function mdlValidarCategorias($tabla, $item,$valor){
        if($item != null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE LOWER($item) = LOWER(:$item)");
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
    EDITAR CATEGORÍA
    ======================================================== */

    static public function mdlEditarCategoria($tabla,$datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET categoria = :categoria WHERE id = :id");
        $stmt->bindParam(":categoria",$datos["categoria"], PDO::PARAM_STR);
        $stmt->bindParam(":id",$datos["id"], PDO::PARAM_INT);
        
        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt = null;


    }

    
    /* =====================================================
    ELIMINAR CATEGORÍA
    ======================================================== */

    static public function mdlEliminarCategoria($tabla,$datos){
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
        $stmt->bindParam(":id",$datos, PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt = null;
    }


}