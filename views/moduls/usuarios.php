<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administrar Usuarios
            </h1>
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Usuarios</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">Agregar Usuario</button>
        </div>
        
        <div class="card-body">
          <table id="tablaUser" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Foto</th>
                <th>Rol</th>
                <th>Estado</th>
                <th>Último Login</th>
                <th>Acciones</th>
              </tr>
            </thead>

            <tbody>

            <?php
            $item = null;
            $valor = null;
            $usuarios = UsuariosController::ctrMostrarUser($item,$valor);
            
            foreach ($usuarios as $key => $value) {
              
              echo ' <tr>
              <td>'.($key+1).'</td>
              <td>'.$value["nombre"].'</td>
              <td>'.$value["usuario"].'</td>
              ';
              if($value["foto"] != ""){
                echo '<td><img src="'.$value["foto"].'" alt="" class="img-thumbnail" width="40px"></td>';
              }else{
                echo '<td><img src="views/img/usuarios/default/default.png" alt="" class="img-thumbnail" width="40px"></td>';
              }  

              echo '
              <td>'.$value["perfil"].'</td>';

              if($value["estado"] != 0){

                echo '<td><button class="btn btn-success btn-xs btnActivar" idUser="'.$value["id"].'" stateUser="0">Activado</button></td>';
              }else{
                echo '<td><button class="btn btn-danger btn-xs btnActivar" idUser="'.$value["id"].'" stateUser="1">Desactivado</button></td>';
              }
              

              echo '
              <td>'.$value["ultimo_login"].'</td>
              <td>
                <div class="btn-group " role="group">

                <button class="btn btn-warning btnEditarUsuario" idUser = "'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUser"><i class="fas fa-pencil-alt"></i></button>
                <button class="btn btn-danger btnEliminarUser" idUser = "'.$value["id"].'" fotoUser = "'.$value["foto"].'" usuario = "'.$value["usuario"].'"><i class="fas fa-trash-alt"></i></button>
                </div>
              </td>
            </tr>';
            }

            ?>
              <!-- <tr>
                <td>1</td>
                <td>Jhon Cristancho</td>
                <td>admin</td>
                <td><img src="views/img/usuarios/default/default.png" alt="" class="img-thumbnail" width="40px"></td>
                <td>Administrador</td>
                <td><button class="btn btn-success btn-xs">Activado</button></td>
                <td>hoy</td>
                <td>
                  <div class="btn-group " role="group">

                  <button class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
                  <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                  </div>
                </td>
              </tr> -->
              
            </tbody>

            <tfoot>
              <tr>
                <th style="width: 10px;">#</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Foto</th>
                <th>Rol</th>
                <th>Estado</th>
                <th>Último Login</th>
                <th>Acciones</th>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- =====================================================
            MODAL AGREGAR USUARIO
  ======================================================== -->
  <div class="modal fade" id="modalAgregarUsuario">
        <div class="modal-dialog">
          <div class="modal-content">
            <form role="form" method="POST" enctype="multipart/form-data">
              <!-- =====================================================
              CABEZA DEL MODAL
              ======================================================== -->
              <div class="modal-header" style="background: #007bff;">
                <h4 class="modal-title" style="color: white;">Agregar Usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <!-- =====================================================
              CUERPO DEL MODAL
              ======================================================== -->
              <div class="modal-body">
                <div class="box-body">
                  <!-- ENTRADA PARA EL NOMBRE -->
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                      </div>
                      <input type="text" name="nuevoNombre" class="form-control" placeholder="Ingresar Nombre" aria-label="Nombre" required>
                    </div>
                  </div>

                  <!-- ENTRADA PARA EL USUARIO -->
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend ">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-user-secret"></i></span>
                      </div>
                      <input type="text" id="nuevoUser" name="nuevoUser" class="form-control" placeholder="Ingresa Usuario" aria-label="Usuario" required>
                    </div>
                  </div>
                  <!-- ENTRADA PARA LA CONTRASEÑA -->
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                      </div>
                      <input type="password" name="nuevaPassword" class="form-control" placeholder="Ingresa La Contraseña" aria-label="Password" required>
                    </div>
                  </div>
                  <!-- ENTRADA PARA ROL -->
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-user-cog"></i></span>
                      </div>
                      <select class="custom-select" name="nuevoPerfil">
                        <option value="" selected> Seleccione el rol </option>
                        <option value="administrador">Administrador</option>
                        <option value="especial">Especial</option>
                        <option value="vendedor">Vendedor</option>
                      </select>
                    </div>
                  </div>

                  <!-- ENTRADA PARA SUBIR FOTO -->
                  <div class="form-group">
                    <label for="nuevaFoto">Subir Foto</label>
                    <input type="file" class="form-control-file nuevaFoto" name="nuevaFoto">
                    <p>Peso maximo de la foto de 2 MB</p>
                    <img src="views/img/usuarios/default/default.png" class="img-thumbnail previsualizar" width="100px" height="100px" alt="">
                  </div>


                </div>
              </div>
              <!-- =====================================================
              PIE DEL MODAL
              ======================================================== -->
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>

              <?php

              $crearUser = new UsuariosController();
              $crearUser -> ctrCrearUser();

              ?>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- =====================================================
            MODAL EDITAR USUARIO
  ======================================================== -->
  <div class="modal fade" id="modalEditarUser">
        <div class="modal-dialog">
          <div class="modal-content">
            <form role="form" method="POST" enctype="multipart/form-data">
              <!-- =====================================================
              CABEZA DEL MODAL
              ======================================================== -->
              <div class="modal-header" style="background: #007bff;">
                <h4 class="modal-title" style="color: white;">Editar Usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <!-- =====================================================
              CUERPO DEL MODAL
              ======================================================== -->
              <div class="modal-body">
                <div class="box-body">
                  <!-- ENTRADA PARA EL NOMBRE -->
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                      </div>
                      <input type="text" name="editarNombre"  id="editarNombre" class="form-control" value="" aria-label="Nombre" required>
                    </div>
                  </div>

                  <!-- ENTRADA PARA EL USUARIO -->
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-user-secret"></i></span>
                      </div>
                      <input type="text" name="editarUser" id="editarUser" class="form-control" value="" aria-label="Usuario" readonly>
                    </div>
                  </div>
                  <!-- ENTRADA PARA LA CONTRASEÑA -->
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                      </div>
                      <input type="password" name="editarPassword" class="form-control" placeholder="Escriba una nueva contraseña" aria-label="Password">
                      <input type="hidden" name="passwordActual" id="passwordActual">
                    </div>
                  </div>
                  <!-- ENTRADA PARA ROL -->
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-user-cog"></i></span>
                      </div>
                      <select class="custom-select" name="editarPerfil">
                        <option value="" id="editarPerfil" selected> </option>
                        <option value="administrador">Administrador</option>
                        <option value="especial">Especial</option>
                        <option value="vendedor">Vendedor</option>
                      </select>
                    </div>
                  </div>

                  <!-- ENTRADA PARA SUBIR FOTO -->
                  <div class="form-group">
                    <label for="editarFoto">Subir Foto</label>
                    <input type="file" class="form-control-file editarFoto" name="editarFoto">
                    <p>Peso maximo de la foto de 2 MB</p>
                    <img src="views/img/usuarios/default/default.png" class="img-thumbnail previsualizar" width="100px" height="100px" alt="">
                    <input type="hidden" name="fotoActual" id="fotoActual">
                  </div>


                </div>
              </div>
              <!-- =====================================================
              PIE DEL MODAL
              ======================================================== -->
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
              </div>

              <?php

              $editarUser = new UsuariosController();
              $editarUser -> ctrEditarUser();

              ?>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <?php

  $borrarUser = new UsuariosController();
  $borrarUser->ctrBorrarUser();

  ?>
