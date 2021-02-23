<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="inicio" class="nav-link">Inicio</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Contacto</a>
    </li>
  </ul>

  <!-- SEARCH FORM -->
  <form class="form-inline ml-3">
    <div class="input-group input-group-sm ">
      <input class="form-control form-control-navbar" type="search" placeholder="Buscar..." aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-navbar " type="submit">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </div>
  </form>

  <!-- perfin de usuario  
  <ul class="navbar-nav p-2 bd-highlight">
    <li class="dropdown user user-menu" >
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="views/img/usuarios/default/default.png" alt="" class="user-image">
        <span class="hidden-xs">Usuario Administrador</span>
      </a>-->
      <!-- dropdown toggle de usuario  
      <ul class="dropdown-menu mt-3">
        <li class="user-body ">
          <div class="pull-right">
            <a href="" class="btn btn-default btn-flat">salir</a>
          </div>
        </li>
      </ul>
    </li>
  </ul> -->
  
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown user user-menu">
        <a class="nav-link d-flex" data-toggle="dropdown" href="#">

        <?php

        if($_SESSION["foto"] != ""){

          echo '<img src="'.$_SESSION["foto"].'" alt="" class="user-image">';
        }else{

          echo '<img src="views/img/usuarios/default/default.png" alt="" class="user-image">';
        }

        ?>
          <span class="hidden-xs "><?php echo $_SESSION["usuario"]; ?></span>
          
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <div class="dropdown-item pull-right">
              <a href="salir" class="btn btn-primary btn-flat">Salir</a>
            </div>
          </div>
    </li>
  </ul>
</nav>
<!-- /.navbar -->
