<!-- Modal Agregar Imagenes -->
<div class="modal fade" id="modalAnadirImagen" tabindex="-1" aria-labelledby="modalAnadirImagenLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Añadir Imágenes</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form id="formStoreImagenes" enctype="multipart/form-data" role="form">
            <div class="modal-body">  
                <input type="hidden" id="idProducto" name="idProducto" value="{{$producto->id}}">              
                <div class="mb-3">
                <label for="nuevoImagen" class="form-label">Imágenes del producto</label>
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