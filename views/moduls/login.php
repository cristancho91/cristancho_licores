<body class="login-page">

   
   <div class="imagen-login fixed-top">
        <img src="views/img/plantilla/logocolor.png" alt="" class="img-fluid">
    </div>
<div class="login-box ">
  <div class="login-logo">
    <a href="#"><b>CRISTANCHOLICORES</b></a>
    <!-- <img src="views/img/plantilla/logocolor.png" alt="" class="img-fluid"> -->

  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Ingresar Al Sistema</p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Usuario" name="IngUser" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Contraseña" name="IngPassword" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12 col-md-12">
            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
          </div>
          <!-- /.col -->
        </div>

        <?php
            $login = new UsuariosController();
            $login -> ctrIngresoUsuer();

        ?>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>