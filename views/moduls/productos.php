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
          <table id="tablaProductos" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th style="width: 10px;">#</th>
                <th>Imagen</th>
                <th>Descripción</th>
                <th>Codigo</th>                
                <th>Categoria</th>
                <th>Stock</th>
                <th>Precio de Compra</th>
                <th>Precio de Venta</th>
                <th>Agregado</th>
                <th>Acciones</th>
              </tr>
            </thead>

            <tbody>

                  <!-- if($value["imagen"] != ""){
                    echo '<td><img src="'.$value["imagen"].'" alt="" class="img-thumbnail" width="40px"></td>';
                  }else{
                    echo '<td><img src="views/img/productos/default/anonymous.png" alt="" class="img-thumbnail" width="40px"></td>';
                  }  

                  echo '
                  <td>'.$value["codigo"].'</td>                
                  <td>'.$value["descripcion"].' </td>';

                  $item = "id";
                  $valor = $value["id_categoria"];
                  $categoria = CategoriasController::ctrValidarCategoria($item,$valor);
                  echo '
                  <td>'.$categoria["categoria"].'</td>'; -->
      
              
            </tbody>

            <tfoot>
              <tr>
                <th style="width: 10px;">#</th>
                <th>Imagen</th>                
                <th>Descripción</th>
                <th>Codigo</th>
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

                   <!-- ENTRADA PARA LA CATEGORÍA -->
                   <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-th"></i></span>
                      </div>
                      <select class="custom-select" id="NuevaCategoriaProcto" name="NuevaCategoriaProcto" required>
                        <option value="" selected> Seleccione la categoría </option>
                        <?php
                          $item = null;
                          $valor = null;

                          $categoria = CategoriasController::ctrValidarCategoria($item,$valor);
                          foreach ($categoria as $key => $value) {
                            echo '<option value="'.$value["id"].'">'.strtoupper($value["categoria"]).'</option>';
                          }
                        ?>                      
                      </select>
                    </div>
                  </div>
                  <!-- ENTRADA PARA EL CÓDIGO -->
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-barcode"></i></span>
                      </div>
                      <input type="text" name="nuevoCodigo" id="nuevoCodigo" class="form-control" placeholder="Ingresar Código" aria-label="Codigo" readonly required>
                    </div>
                  </div>

                  <!-- ENTRADA PARA LA DESCRIPCIÓN -->
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fab fa-product-hunt"></i></span>
                      </div>
                      <input type="text" name="nuevaDescripcion"id="nuevaDescripcion" class="form-control" placeholder="Ingresa La Descripción" aria-label="Descripcion" required>
                    </div>
                  </div>
                  <!-- ENTRADA PARA EL STOCK -->
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-box-open"></i></span>
                      </div>
                      <input type="number" name="nuevoStock" id="nuevoStock" class="form-control" placeholder="Ingrese el Stock" aria-label="stock" min="0" required>
                    </div>
                  </div>

                  
                  <div class="form-group d-flex">
                    <!-- ENTRADA PARA EL PRECIO DE COMPRA -->
                    <div class="col-xs-12  mr-2">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1"><i class="fas fa-shopping-bag"></i></span>
                        </div>
                        <input type="number" id="nuevoPrecioCompra" name="nuevoPrecioCompra" class="form-control" placeholder="Valor de compra" aria-label="precio compra" step="any" min="0" required>
                      </div>
                    </div>

                    <div class="form-group col-xs-12 ">
                      <!-- ENTRADA PARA EL PRECIO DE VENTA -->
                        <div class="input-group col-xs-12 mb-2">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-tags"></i></span>
                          </div>
                          <input type="number" id="nuevoPrecioVenta" name="nuevoPrecioVenta" class="form-control" placeholder="Valor de venta" aria-label="precio venta" step="any" min="0" readonly required>
                        </div>

                        <div class="col-xs-12 d-flex ">
                          
                          <!-- ENTRADA PARA EL CHECK -->
                            <div class="col-xs-6 ">
                              <div class="form-group clearfix " > 
                                <div class="icheck d-inline">
                                  <input type="checkbox" class="porcentaje" id="porcentaje" name="porcentaje" checked>
                                  <label class="small text-bold" for="porcentaje">Utilizar Porcentajes
                                  </label>
                                </div>  
                              </div>
                            </div>
                          
                          <!-- ENTRADA PARA EL PORCENTAJE -->
                          <div class="col-xs-6 ml-1">
                            <div class="input-group">
                              <input type="number" class="form-control nuevoPorcentaje" name="nuevoPorcentaje" id="nuevoPorcentaje" min="0" value="40" placeholder="Porcentaje" >
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
                    <input type="file" class="form-control-file nuevaImagen" name="nuevaImagen">
                    <p>Peso maximo de la imagen de 2 MB</p>
                    <img src="views/img/productos/default/anonymous.png" class="img-thumbnail  rounded-circle previsualizar" width="100px" alt="">
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
              <?php

                $crearProducto = new ProductosController();
                $crearProducto -> ctrCrearProducto();

              ?>
              
            </form>
            

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- =====================================================
   MODAL EDITAR PRODUCTO
  ======================================================== -->
  <div class="modal fade" id="modalEditarPoducto">
        <div class="modal-dialog">
          <div class="modal-content">
            <form role="form" method="POST" enctype="multipart/form-data">
              <!-- =====================================================
              CABEZA DEL MODAL
              ======================================================== -->
              <div class="modal-header" style="background: #007bff;">
                <h4 class="modal-title" style="color: white;">Editar Poducto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <!-- =====================================================
              CUERPO DEL MODAL
              ======================================================== -->
              <div class="modal-body">
                <div class="box-body">

                   <!-- ENTRADA PARA EDITAR LA CATEGORÍA -->
                   <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-th"></i></span>
                      </div>
                      <select class="custom-select"  name="editarCategoriaProducto" readonly required>
                        <option id="editarCategoriaProducto" > </option>
                                      
                      </select>
                    </div>
                  </div>
                  <!-- ENTRADA PARA EL CÓDIGO -->
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-barcode"></i></span>
                      </div>
                      <input type="text" name="editarCodigo" id="editarCodigo" class="form-control" readonly required>
                    </div>
                  </div>

                  <!-- ENTRADA PARA LA DESCRIPCIÓN -->
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fab fa-product-hunt"></i></span>
                      </div>
                      <input type="text" name="editarDescripcion" id="editarDescripcion" class="form-control" aria-label="Descripcion" required>
                    </div>
                  </div>
                  <!-- ENTRADA PARA EL STOCK -->
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-box-open"></i></span>
                      </div>
                      <input type="number" name="editarStock" id="editarStock" class="form-control"  aria-label="stock" min="0" required>
                    </div>
                  </div>

                  
                  <div class="form-group d-flex">
                    <!-- ENTRADA PARA EL PRECIO DE COMPRA -->
                    <div class="col-xs-12  mr-2">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1"><i class="fas fa-shopping-bag"></i></span>
                        </div>
                        <input type="number" id="editarPrecioCompra" name="editarPrecioCompra" class="form-control" placeholder="Valor de compra" aria-label="precio compra" step="any" min="0" required>
                      </div>
                    </div>

                    <div class="form-group col-xs-12 ">
                      <!-- ENTRADA PARA EL PRECIO DE VENTA -->
                        <div class="input-group col-xs-12 mb-2">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-tags"></i></span>
                          </div>
                          <input type="number" id="editarPrecioVenta" name="editarPrecioVenta" class="form-control" placeholder="Valor de venta" aria-label=" precio venta" step="any" min="0" readonly required>
                        </div>

                        <div class="col-xs-12 d-flex ">
                          
                          <!-- ENTRADA PARA EL CHECK -->
                            <div class="col-xs-6 ">
                              <div class="form-group clearfix " > 
                                <div class="icheck d-inline">
                                  <input type="checkbox" class="porcentaje2"  id="porcentaje2" name="porcentaje2" checked>
                                  <label class="small text-bold" for="porcentaje2" >Utilizar Porcentajes
                                  </label>
                                </div>  
                              </div>
                            </div>
                          
                          <!-- ENTRADA PARA EL PORCENTAJE -->
                          <div class="col-xs-6 ml-1">
                            <div class="input-group">
                              <input type="number" class="form-control editarPorcentaje" name="editarPorcentaje" id="editarPorcentaje" min="0" value="40" placeholder="Porcentaje" >
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
                    <label for="editarImagen">Editar Imagen</label>
                    <input type="file" class="form-control-file nuevaImagen" name="editarImagen">
                    <p>Peso maximo de la imagen de 2 MB</p>
                    <img src="views/img/productos/default/anonymous.png" class="img-thumbnail  rounded-circle previsualizar" width="100px" alt="">
                    <input type="hidden" name="imagenActual" id="imagenActual">
                  </div>

                </div>
              </div>
              <!-- =====================================================
              PIE DEL MODAL
              ======================================================== -->
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Actualizar Producto</button>
              </div>
              <?php

                $editarProducto = new ProductosController();
                $editarProducto -> ctrEditarProductos();

              ?>
              
            </form>
            

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <?php

    $eliminarProducto = new ProductosController();
    $eliminarProducto -> ctrEliminarProducto();

  ?>