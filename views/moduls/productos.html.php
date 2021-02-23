<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administración de productos
            </h1>
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Productos</li>
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
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPoducto">Agregar Producto</button>
        </div>
        
        <div class="card-body">
          <table id="tablaUser" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th style="width: 10px;">#</th>
                <th>Imagen</th>
                <th>Codigo</th>
                <th>Descripción</th>
                <th>Categoria</th>
                <th>Stock</th>
                <th>Precio de Compra</th>
                <th>Precio de Venta</th>
                <th>Agregado</th>
                <th>Acciones</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>1</td>
                <td><img src="views/img/productos/default/anonymous.png" alt="" class="img-thumbnail" width="40px"></td>
                <td>001</td>                
                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. </td>
                <td>Cervezas</td>
                <td>20</td>
                <td>$47500</td>
                <td>$55000</td>
                <td>hoy</td>
                <td>
                  <div class="btn-group " role="group">

                  <button class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
                  <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                  </div>
                </td>
              </tr>
              
            </tbody>

            <tfoot>
              <tr>
                <th style="width: 10px;">#</th>
                <th>Imagen</th>
                <th>Codigo</th>
                <th>Descripción</th>
                <th>Categoria</th>
                <th>Stock</th>
                <th>Precio de Compra</th>
                <th>Precio de Venta</th>
                <th>Agregado</th>
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
   MODAL AGREGAR PRODUCTO
  ======================================================== -->
  <div class="modal fade" id="modalAgregarPoducto">
        <div class="modal-dialog">
          <div class="modal-content">
            <form role="form" method="POST" enctype="multipart/form-data">
              <!-- =====================================================
              CABEZA DEL MODAL
              ======================================================== -->
              <div class="modal-header" style="background: #007bff;">
                <h4 class="modal-title" style="color: white;">Agregar Poducto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <!-- =====================================================
              CUERPO DEL MODAL
              ======================================================== -->
              <div class="modal-body">
                <div class="box-body">
                  <!-- ENTRADA PARA EL CÓDIGO -->
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-barcode"></i></span>
                      </div>
                      <input type="text" name="nuevoCodigo" class="form-control" placeholder="Ingresar Código" aria-label="Codigo" required>
                    </div>
                  </div>

                  <!-- ENTRADA PARA LA DESCRIPCIÓN -->
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fab fa-product-hunt"></i></span>
                      </div>
                      <input type="text" name="nuevaDescripcion" class="form-control" placeholder="Ingresa La Descripción" aria-label="Descripcion" required>
                    </div>
                  </div>

                  <!-- ENTRADA PARA LA CATEGORÍA -->
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-th"></i></span>
                      </div>
                      <select class="custom-select" name="NuevaCategoria">
                        <option value="" selected> Seleccione la categoría </option>
                        <option value="cervezas">Cervezas</option>
                        <option value="aguardientes">Aguardientes</option>
                        <option value="vinos">Vinos</option>
                      </select>
                    </div>
                  </div>
                  <!-- ENTRADA PARA EL STOCK -->
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fab fa-product-hunt"></i></span>
                      </div>
                      <input type="number" name="nuevoStock" class="form-control" placeholder="Ingrese el Stock" aria-label="stock" min="0" required>
                    </div>
                  </div>

                  
                  <div class="form-group d-flex">
                    <!-- ENTRADA PARA EL PRECIO DE COMPRA -->
                    <div class="col-xs-6 mr-2">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1"><i class="fas fa-shopping-bag"></i></span>
                        </div>
                        <input type="number" name="nuevoPrecioCompra" class="form-control" placeholder="Valor de compra" aria-label="precio compra" min="0" required>
                      </div>
                    </div>

                    <div class="form-group col-xs-6 ">
                      <!-- ENTRADA PARA EL PRECIO DE VENTA -->
                        <div class="input-group col-xs-12 mb-2">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-tags"></i></span>
                          </div>
                          <input type="number" name="nuevoPrecioVenta" class="form-control" placeholder="Valor de venta" aria-label=" precio venta" min="0" required>
                        </div>

                        <div class="col-xs-12 d-flex">
                          <!-- ENTRADA PARA EL CHECK -->
                          <div class="col-xs-6">
                            <div class="form-group clearfix" > 
                            <div class="icheck-primary d-inline">
                              <input type="checkbox" id="checkboxPorcentaje" checked>
                              <label class="small text-bold" for="checkboxPorcentaje">Usar Porcentajes
                              </label>
                            </div>  
                            </div>
                          </div>
                          <!-- ENTRADA PARA EL PORCENTAJE -->
                          <div class="col-xs-6 ml-1">
                            <div class="input-group">
                              <input type="number" class="form-control nuevoPorcentaje " min="0" value="40" placeholder="Porcentaje" >
                              <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-percent"></i></span>
                              </div>
                            </div>
                          
                          </div>

                        </div>
                    </div>
                  </div>

                   <!-- ENTRADA PARA SUBIR IMAGEN -->
                   <div class="form-group">
                    <label for="nuevaImagen">Subir Imagen</label>
                    <input type="file" class="form-control-file" id="nuevaImagen" name="nuevaImagen">
                    <p>Peso maximo de la imagen de 2 MB</p>
                    <img src="views/img/productos/default/anonymous.png" class="img-thumbnail rounded-circle" width="100px" alt="">
                  </div>

                </div>
              </div>
              <!-- =====================================================
              PIE DEL MODAL
              ======================================================== -->
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar Producto</button>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->