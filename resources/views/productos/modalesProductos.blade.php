 
  <!-- Modal -->
  <div class="modal fade" id="modalNuevoProducto" tabindex="-1" aria-labelledby="modalNuevoProductoLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Crear Producto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form id="formStoreProducto" enctype="multipart/form-data" role="form">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nombre del Producto</label>
                    <input type="text" class="form-control" id="nuevoNombre" name="nuevoNombre" placeholder="">
                </div>                
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Descripción</label>
                    <input type="text" class="form-control" id="nuevoDescripcion" name="nuevoDescripcion" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Precio</label>
                    <input type="number" min="0" value="0" step=".01" class="form-control" id="nuevoPrecio" name="nuevoPrecio" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Cantidad</label>
                    <input type="number" min="0" step="1" class="form-control" id="nuevoCantidad" name="nuevoCantidad" placeholder="">
                </div>                
                <div class="mb-3">
                    <label for="nuevoCategoria_id" class="form-label">Categoria</label>
                    <select class="form-select" id="nuevoCategoria_id" name="nuevoCategoria_id">
                        <option selected>Seleccione una categoría</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                        @endforeach                        
                      </select>
                </div>
                <div class="mb-3">
                    <label for="nuevoMarca_id" class="form-label">Emprendimiento</label>
                    <select class="form-select" id="nuevoMarca_id" name="nuevoMarca_id">
                        <option selected>Seleccione un emprendimiento</option>
                        @foreach ($marcas as $marca)
                            <option value="{{$marca->id}}">{{$marca->nombre}}</option>
                        @endforeach                        
                      </select>
                </div>                               
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="1" id="nuevoVisible" name="nuevoVisible">
                    <label class="form-check-label" for="nuevoVisible">
                      Seleccione esta casilla si el producto debe estar visible
                    </label>
                </div>
                <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Imágenes del producto</label>
                <input class="form-control" type="file" id="nuevoImagen" name="nuevoImagen" multiple>
                </div>
                  
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>

      </div>
    </div>
  </div>