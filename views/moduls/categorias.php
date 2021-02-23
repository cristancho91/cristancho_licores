<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administrar Categorías
            </h1>
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Categorias</li>
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
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">Agregar Categoría</button>
        </div>
        
        <div class="card-body">
          <table id="tablaCategoria" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Categoría</th>
                <th>Acciones</th>
              </tr>
            </thead>

            <tbody>

              <?php

                $item = null;
                $valor = null;
                $respuesta = CategoriasController::ctrValidarCategoria($item, $valor);
                
                foreach ($respuesta as $key => $value) {
                  echo '
                  
                    <tr>
                      <td>'.($key+1).'</td>
                      <td class="text-uppercase">'.$value["categoria"].'</td>
                      <td>
                        <div class="btn-group " role="group">
      
                        <button class="btn btn-warning btnEditarCategoria" idCategoria="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCategoria"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-danger btnEliminarCategoria" idCategoria="'.$value["id"].'"><i class="fas fa-trash-alt"></i></button>
                        </div>
                      </td>
                    </tr>
                  
                  ';
                }

              ?>              
            </tbody>

            <tfoot>
              <tr>
                <th style="width: 10px;">#</th>
                <th>Categoria</th>
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
            MODAL AGREGAR Categoría
  ======================================================== -->
  <div class="modal fade" id="modalAgregarCategoria">
        <div class="modal-dialog">
          <div class="modal-content">
            <form role="form" method="POST">
              <!-- =====================================================
              CABEZA DEL MODAL
              ======================================================== -->
              <div class="modal-header" style="background: #007bff;">
                <h4 class="modal-title" style="color: white;">Agregar Categoría</h4>
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
                        <span class="input-group-text" id="basic-addon1"><i class="fab fa-buffer"></i></span>
                      </div>
                      <input type="text" name="nuevaCategoria" id="nuevaCategoria" class="form-control" placeholder="Ingresar Categoría" aria-label="Nombre" required>
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

              <?php
                $crarCategoria = new CategoriasController();
                $crarCategoria -> ctrCrearCategoria();
              ?>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- =====================================================
  MODAL EDITAR CATEGORIA
  ======================================================== -->
  <div class="modal fade" id="modalEditarCategoria">
        <div class="modal-dialog">
          <div class="modal-content">
            <form role="form" method="POST">
              <!-- =====================================================
              CABEZA DEL MODAL
              ======================================================== -->
              <div class="modal-header" style="background: #007bff;">
                <h4 class="modal-title" style="color: white;">Editar Categoría</h4>
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
                        <span class="input-group-text" id="basic-addon1"><i class="fab fa-buffer"></i></span>
                      </div>
                      <input type="text" name="editarCategoria" id="editarCategoria" class="form-control"  required>
                      <input type="hidden" name="idCategoria" id="idCategoria" class="form-control"  required>
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

              <?php
                $editarCategoria = new CategoriasController();
                $editarCategoria -> ctrEditarCategoria();
              ?>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <?php
    $borrarCategoria = new CategoriasController();
    $borrarCategoria -> ctrEliminarCategoria();

  ?>
