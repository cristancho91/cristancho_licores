<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administrar Clientes
            </h1>
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Clientes</li>
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
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">Agregar Cliente</button>
        </div>
        
        <div class="card-body">
          <table id="tablaClientes" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Cedula</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Fecha Nacimiento</th>
                <th>Total Compras</th>
                <th>Última Compra</th>
                <th>Ingreso al Sistema</th>
                <th>Acciones</th>
              </tr>
            </thead>

            <tbody>
              
            </tbody>

            <tfoot>
              <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Cedula</th>
              <th>Email</th>
              <th>Teléfono</th>
              <th>Dirección</th>
              <th>Fecha Nacimiento</th>
              <th>Total Compras</th>
              <th>Última Compra</th>
              <th>Ingreso al Sistema</th>
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
     MODAL AGREGAR CLIENTE
  ======================================================== -->
  <div class="modal fade" id="modalAgregarCliente">
        <div class="modal-dialog">
          <div class="modal-content">
            <form role="form" method="POST">
              <!-- =====================================================
              CABEZA DEL MODAL
              ======================================================== -->
              <div class="modal-header" style="background: #007bff;">
                <h4 class="modal-title" style="color: white;">Agregar Cliente</h4>
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
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-plus"></i></span>
                      </div>
                      <input type="text" name="nombreCliente" class="form-control" placeholder="Ingresar Nombre" aria-label="Nombre" required>
                    </div>
                  </div>

                  <!-- ENTRADA PARA la CEDULA -->
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-id-card"></i></span>
                      </div>
                      <input type="text" name="cedula" class="form-control" placeholder="Ingrese la cedula" aria-label="cedula" required>
                    </div>
                  </div>

                   <!-- ENTRADA PARA TELEFONO -->
                   <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                      </div>
                      <input type="text" name="telefono" class="form-control" placeholder="Ingrese el teléfono" aria-label="telefono"data-inputmask='"mask": "(999) 999-9999"' data-mask required>
                    </div>
                  </div>
                  <!-- ENTRADA PARA la CORREO -->
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                      </div>
                      <input type="email" name="email" class="form-control" placeholder="Ingrese el correo" aria-label="email" required>
                    </div>
                  </div>

                   <!-- ENTRADA PARA la DIRECCION -->
                   <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-street-view"></i></span>
                      </div>
                      <input type="text" name="direccion" class="form-control" placeholder="Ingrese la dirección" aria-label="direccion" required>
                    </div>
                  </div>

                  <!-- ENTRADA PARA la FECHA DE NACIMIENTO -->
                <div class="form-group">
                    <div class="input-group date" id="nacimiento" data-target-input="nearest">
                        
                      <div class="input-group-append" data-target="#nacimiento"    data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                      <input type="text" class="form-control datetimepicker-input" name="nacimiento" data-target="#nacimiento" placeholder="Fecha de nacimiento" data-toggle="datetimepicker"/>
                    </div>
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
            </form>
            <?php

            $crearCliente = new ClientesController();

            $crearCliente ->ctrCrearCliente();

            ?>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  
  <!-- =====================================================
     MODAL EDITAR CLIENTE
  ======================================================== -->
  <div class="modal fade" id="modalEditarCliente">
        <div class="modal-dialog">
          <div class="modal-content">
            <form role="form" method="POST">
              <!-- =====================================================
              CABEZA DEL MODAL
              ======================================================== -->
              <div class="modal-header" style="background: #007bff;">
                <h4 class="modal-title" style="color: white;">Editar Cliente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <!-- =====================================================
              CUERPO DEL MODAL
              ======================================================== -->
              <div class="modal-body">
                <div class="box-body">
                  <!-- ENTRADA PARA EDITAR EL NOMBRE -->
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-plus"></i></span>
                      </div>
                      <input type="text" name="EditarnombreCliente" id ="EditarnombreCliente" class="form-control" aria-label="EditarNombre" required>
                      <input type="hidden" name="idClient" id="idClient">
                    </div>
                  </div>

                  <!-- ENTRADA PARA EDITAR la CEDULA -->
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-id-card"></i></span>
                      </div>
                      <input type="text" name="EditarCedula" id="EditarCedula" class="form-control" aria-label="EditarCedula" required>
                    </div>
                  </div>

                   <!-- ENTRADA PARA EDITAR EL TELEFONO -->
                   <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                      </div>
                      <input type="text" name="EditarTelefono" id="EditarTelefono" class="form-control" aria-label="EditarTelefono"data-inputmask='"mask": "(999) 999-9999"' data-mask required>
                    </div>
                  </div>
                  <!-- ENTRADA PARA EDITAR EL CORREO -->
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                      </div>
                      <input type="email" name="EditarEmail" id="EditarEmail" class="form-control"  aria-label="EditarEmail" required>
                    </div>
                  </div>

                   <!-- ENTRADA PARA EDITAR la DIRECCION -->
                   <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-street-view"></i></span>
                      </div>
                      <input type="text" name="EditarDireccion" id="EditarDireccion" class="form-control"  aria-label="EditarDireccion" required>
                    </div>
                  </div>

                  <!-- ENTRADA PARA EDITAR la FECHA DE NACIMIENTO -->
                <div class="form-group">
                    <div class="input-group date" id="editarNacimiento1" data-target-input="nearest">
                        
                      <div class="input-group-append" data-target="#editarNacimiento"    data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                      <input type="text" class="form-control datetimepicker-input" name="editarNacimiento" id="editarNacimiento" data-target="#editarNacimiento" data-toggle="datetimepicker"/>
                    </div>
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
            </form>
            <?php

            $editarCliente = new ClientesController();

            $editarCliente ->ctreditarCliente();

            ?>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <?php

    $eliminarCliente = new ClientesController();

    $eliminarCliente ->ctrEliminarCliente();

  ?>
