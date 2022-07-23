<?php

require_once "conexion.php";

class ModelUsuario{


  static public function mdlIngresarUsuario($tabla, $datos){


    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, usuario, password) VALUES(:nombre, :usuario, :password)");
    $stmt ->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
    $stmt ->bindParam(":usuario",$datos["usuario"],PDO::PARAM_STR);
    $stmt ->bindParam(":password",$datos["password"],PDO::PARAM_STR);

    if($stmt ->execute()){
      return true;
    }else{
      return false;
    }
    
    $stmt -> close;
    $stmt = null;

  }

  static public function mdlMostrarUsuarios($tabla){
    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");
     
  
    $stmt ->execute();
    
    return $stmt-> fetchAll();

    $stmt -> close;
    $stmt = null;

  }

  public static function mdlMostrarUsuarioById($tabla, $item, $valor){

    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
    $stmt ->bindParam(":".$item,$valor,PDO::PARAM_STR);
     
  
    $stmt ->execute();
    
    return $stmt-> fetch();

    $stmt -> close;
    $stmt = null;

  }

  public static function mdlMostrarUsuarioByUsername($tabla, $item, $valor){

    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
    $stmt ->bindParam(":".$item,$valor,PDO::PARAM_STR);
     
  
    $stmt ->execute();
    
    return $stmt-> fetch();

    $stmt -> close;
    $stmt = null;

  }
  static public function mdlEditarUsuario($tabla, $datos){

    
    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, usuario = :usuario, password = :password WHERE id = :id");

    $stmt ->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
    $stmt ->bindParam(":usuario",$datos["usuario"],PDO::PARAM_STR);
    $stmt ->bindParam(":password",$datos["password"],PDO::PARAM_STR);
    $stmt ->bindParam(":id",$datos["id"],PDO::PARAM_STR);


    if($stmt ->execute()){
      return true;
    }else{
      return false;
    }
    
    $stmt -> close;
    $stmt = null;
  }

  static public function mdlBorrarUsuario($tabla,$datos){

    $stmt = Conexion::conectar()->prepare("DELETE  FROM $tabla WHERE id =:id");
    $stmt ->bindParam(":id",$datos,PDO::PARAM_STR);

    if($stmt ->execute()){
      return true;
    }else{
      return false;
    }
    
    $stmt -> close;
    $stmt = null;
  }

}