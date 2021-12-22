 
 <!-- Modal Crear Producto -->
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
            <label for="nuevoNombre" class="form-label">Nombre del Producto</label>
            <input type="text" class="form-control" id="nuevoNombre" name="nuevoNombre" placeholder="">
            <p class="invalid-feedback" id="error-nuevoNombre"></p>
          </div>                
          <div class="mb-3">
            <label for="nuevoDescripcion" class="form-label">Descripción</label>
            <textarea type="text" class="form-control" id="nuevoDescripcion" name="nuevoDescripcion"></textarea>
            <p class="invalid-feedback" id="error-nuevoDescripcion"></p>
          </div>
          <div class="mb-3">
            <label for="nuevoPrecio" class="form-label">Precio</label>
            <input type="number" step=".01" class="form-control" id="nuevoPrecio" name="nuevoPrecio" placeholder="">
            <p class="invalid-feedback" id="error-nuevoPrecio"></p>
          </div>
          <div class="mb-3">
            <label for="nuevoCantidad" class="form-label">Cantidad</label>
            <input type="number" class="form-control" id="nuevoCantidad" name="nuevoCantidad" placeholder="">
            <p class="invalid-feedback" id="error-nuevoCantidad"></p>
          </div>                
          <div class="mb-3">
            <label for="nuevoCategoria_id" class="form-label">Categoria</label>
            <select class="form-select" id="nuevoCategoria_id" name="nuevoCategoria_id">
              <option selected disabled value="">Seleccione una categoría</option>
              @foreach ($categorias as $categoria)
              <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
              @endforeach                        
            </select>
            <p class="invalid-feedback" id="error-nuevoCategoria_id"></p>
          </div>
          <div class="mb-3">
            <label for="nuevoMarca_id" class="form-label">Emprendimiento</label>
            <select class="form-select" id="nuevoMarca_id" name="nuevoMarca_id">
              <option selected disabled value="">Seleccione un emprendimiento</option>
              @foreach ($marcas as $marca)
              <option value="{{$marca->id}}">{{$marca->nombre}}</option>
              @endforeach                        
            </select>
            <p class="invalid-feedback" id="error-nuevoMarca_id"></p>
          </div>                               
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="1" id="nuevoVisible" name="nuevoVisible">
            <label class="form-check-label" for="nuevoVisible">
              Seleccione esta casilla si el producto debe estar visible
            </label>
          </div>
          <div class="mb-3">
            <label for="formFileMultiple" class="form-label">Imágenes del producto</label>
            <input class="form-control" type="file" id="nuevoImagen" name="nuevoImagen" multiple accept="image/png, image/jpeg, image/jpg, image/svg">
            <p class="invalid-feedback" id="error-nuevoImagen"></p>
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


<!-- Modal Editar Producto -->
<div class="modal fade" id="modalEditarProducto" tabindex="-1" aria-labelledby="modalEditarProductoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <form id="formEditProducto" enctype="multipart/form-data" role="form">
        @method('PUT')
        <input type="hidden" name="idEditarProducto" id="idEditarProducto">
        <div class="modal-body">
          <div class="mb-3">
            <label for="editarNombre" class="form-label">Nombre del Producto</label>
            <input type="text" class="form-control" id="editarNombre" name="editarNombre" placeholder="">
            <p class="invalid-feedback" id="error-editarNombre"></p>
          </div>                
          <div class="mb-3">
            <label for="editarDescripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="editarDescripcion" name="editarDescripcion" ></textarea>
            <p class="invalid-feedback" id="error-editarDescripcion"></p>
          </div>
          <div class="mb-3">
            <label for="editarPrecio" class="form-label">Precio</label>
            <input type="number" step=".01" class="form-control" id="editarPrecio" name="editarPrecio" placeholder="">
            <p class="invalid-feedback" id="error-editarPrecio"></p>
          </div>
          <div class="mb-3">
            <label for="editarCantidad" class="form-label">Cantidad</label>
            <input type="number" step="1" class="form-control" id="editarCantidad" name="editarCantidad" placeholder="">
            <p class="invalid-feedback" id="error-editarCantidad"></p>
          </div>                
          <div class="mb-3">
            <label for="editarCategoria_id" class="form-label">Categoria</label>
            <select class="form-select" id="editarCategoria_id" name="editarCategoria_id">
              <option selected disabled value="">Seleccione una categoría</option>
              @foreach ($categorias as $categoria)
              <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
              @endforeach                        
            </select>
            <p class="invalid-feedback" id="error-editarCategoria_id"></p>
          </div>
          <div class="mb-3">
            <label for="editarMarca_id" class="form-label">Emprendimiento</label>
            <select class="form-select" id="editarMarca_id" name="editarMarca_id">
              <option selected disabled value="">Seleccione un emprendimiento</option>
              @foreach ($marcas as $marca)
              <option value="{{$marca->id}}">{{$marca->nombre}}</option>
              @endforeach                        
            </select>
            <p class="invalid-feedback" id="error-editarMarca_id"></p>
          </div>                               
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="1" id="editarVisible" name="editarVisible">
            <label class="form-check-label" for="editarVisible">
              Seleccione esta casilla si el producto debe estar visible
            </label>
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