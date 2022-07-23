<section class="container">

  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalagregarUsuario">
    Agregar Usuario
  </button>

  <br>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Usuario</th>
        <th scope="col">Acciones</th>

      </tr>
    </thead>
    <tbody>
      <?php
      $usuarios = ControllerUsuario::ctrMostrarUsuarios();

      foreach ($usuarios as $key => $value) {

        echo '
        <tr>
        <th scope="row">1</th>
        <td>' . $value["nombre"] . '</td>
        <td>' . $value["usuario"] . '</td>

        <td>
        <div class="btn-group">
          <button class="btn btn-warning btnEditarUsuario" idUsuario=' . $value["id"] . ' data-toggle="modal" data-target="#modaleditarUsuario"><i class="fa fa-pencil"></i></button>
          <button class="btn btn-danger btnEliminarUsuario" idUsuario=' . $value["id"] . '><i class="fa fa-times"></i></button>
        </div>
      </td>
      </tr>
        ';
      }

      ?>


    </tbody>

    <!-- Modal -->
    <div class="modal fade" id="modalagregarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

          <form role="form" method="post" enctype="multipart/form-data">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Agregar Usuario</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div class="form-group">
                <label>Nombre</label>
                <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" aria-describedby="emailHelp" placeholder="Ingresa un nombre">

              </div>
              <div class="form-group">
                <label>Usuario</label>
                <input type="text" class="form-control" id="usuario" name="usuario" aria-describedby="emailHelp" placeholder="Ingresa un usuario">

              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" id="passwordUsuario" name="passwordUsuario" placeholder="Password">
              </div>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>

            </div>

            <?php
            $crearUsuario = new ControllerUsuario();
            $crearUsuario->ctrCrearUsuario();
            ?>
          </form>
        </div>
      </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modaleditarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

          <form role="form" method="post" enctype="multipart/form-data">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Editar Usuario</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div class="form-group">
                <label>Nombre</label>
                <input type=hidden id="idActualUsuario" name="idActualUsuario">
                <input type="text" class="form-control" id="editarNombre" name="editarNombre" aria-describedby="emailHelp" placeholder="Ingresa un nombre">

              </div>
              <div class="form-group">
                <label>Usuario</label>
                <input type="text" class="form-control" id="editarUsuario" name="editarUsuario" aria-describedby="emailHelp" placeholder="Ingresa un usuario">

              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" id="editarPassword" name="editarPassword" placeholder="Password">
                <input type=hidden id="passwordActual" name="passwordActual">
              </div>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>

            </div>

            <?php
            $editarUsuario = new ControllerUsuario();
            $editarUsuario->ctrEditarUsuario();

            ?>
          </form>
        </div>
      </div>
    </div>


    <?php
    $borrarUsuario = new ControllerUsuario();
    $borrarUsuario->ctrBorrarUsuario();
    ?>
</section>