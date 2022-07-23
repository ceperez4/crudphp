<section class="container">
  <form method="post">
    <div class="form-group">
      <label for="exampleInputEmail1">Usuario</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="ingUsuario" aria-describedby="emailHelp" placeholder="Usuario">

    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" name="ingPassword" placeholder="Password">
    </div>

    <button type="submit" class="btn btn-primary">Ingresar</button>

    <?php
    
        $login = new ControllerUsuario();
        $login->ctrlLoginUsuario();
     
      ?>

  </form>
</section>