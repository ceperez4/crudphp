<?php

class ControllerUsuario
{


  static public function ctrCrearUsuario()
  {
    if (isset($_POST["usuario"])) {

      if ($_POST["usuario"] != "") {
        $tabla = "usuarios";

        $encriptar = crypt($_POST["passwordUsuario"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

        $datos = array(
          "nombre" => $_POST["nombreUsuario"],
          "usuario" => $_POST["usuario"],
          "password" => $encriptar

        );

        $respuesta = ModelUsuario::mdlIngresarUsuario($tabla, $datos);

        if ($respuesta == true) {
          echo '
          <script>
          alert("Usuario Agregado");
          window.location = "usuario";
          </script>
          ';
        }
      } else {
        echo '
        <script>
        alert("El usuario no puede ir vacio");
        window.location = "usuario";
        </script>
        ';
      }
    }
  }


  static public function ctrMostrarUsuarios()
  {

    $tabla = "usuarios";

    $respuesta = ModelUsuario::mdlMostrarUsuarios($tabla);

    return $respuesta;
  }
  static public function ctrlMostrarUsuarioById($item, $valor)
  {
    $tabla = "usuarios";


    $respuesta = ModelUsuario::mdlMostrarUsuarioById($tabla, $item, $valor);

    return $respuesta;
  }


  static public function ctrEditarUsuario()
  {

    if (isset($_POST["editarUsuario"])) {

      if ($_POST["editarUsuario"] != "") {
        $tabla = "usuarios";

        if ($_POST["editarPassword"] != "") {

          $encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
        } else {
          $encriptar = $_POST["passwordActual"];
        }


        $datos = array(
          "id" => $_POST["idActualUsuario"],
          "nombre" => $_POST["editarNombre"],
          "usuario" => $_POST["editarUsuario"],
          "password" => $encriptar

        );

        $respuesta = ModelUsuario::mdlEditarUsuario($tabla, $datos);

        if ($respuesta == true) {
          echo '
          <script>
          alert("Usuario Editado");
          window.location = "usuario";
          </script>
          ';
        }
      } else {
        echo '
        <script>
        alert("El usuario no puede ir vacio");
        window.location = "usuario";
        </script>
        ';
      }
    }
  }


  static public function ctrBorrarUsuario()
  {


    if (isset($_GET["idUsuario"])) {

      $tabla = "usuarios";
      $datos = $_GET["idUsuario"];


      $respuesta = ModelUsuario::mdlBorrarUsuario($tabla, $datos);

      if ($respuesta == true) {
        echo '
          <script>
          alert("Usuario Eliminado");
          window.location = "usuario";
          </script>
          ';
      }
    }
  }

  static public function ctrlLoginUsuario()
  {
    if (isset($_POST["ingUsuario"])) {

      if ($_POST["ingUsuario"] != "") {

        $encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
        $tabla = "usuarios";
        $item = "usuario";
        $valor = $_POST["ingUsuario"];

        $respuesta = ModelUsuario::mdlMostrarUsuarioByUsername($tabla, $item, $valor);

        if ($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] ==  $encriptar) {

          $_SESSION["iniciarSesion"]="ok";
          echo'
          <script>
            window.location = "usuario";
          </script>
          ';
         

        } else {
          echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
        }
        
      }else{
        echo '<br><div class="alert alert-danger">Error al ingresar, Complete los campos</div>';
      }
    }
  }
}
