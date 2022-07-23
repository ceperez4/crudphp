<?php

require_once "../controllers/usuario.controller.php";
require_once "../models/usuario.model.php";

class AjaxUsuarios
{

  public $idUsuario;
  public function ajaxEditarUsuario(){

    $item = 'id';
    $valor = $this->idUsuario;
    $respuesta = ControllerUsuario::ctrlMostrarUsuarioById($item,$valor);
    echo json_encode($respuesta);

  }


}

if (isset($_POST['idUsuario'])) {
  $editar = new AjaxUsuarios();
  $editar->idUsuario = $_POST["idUsuario"];
  $editar->ajaxEditarUsuario();
}



