 
  <!-- Modal Crear Cliente -->
  <div class="modal fade" id="modalNuevoCliente" tabindex="-1" aria-labelledby="modalNuevoClienteLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Crear Cliente</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <form id="formStoreCliente" enctype="multipart/form-data" role="form">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nombre del Cliente</label>
                    <input type="text" class="form-control" id="nuevoNombre" name="nuevoNombre" placeholder="">
                </div>                
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">RUC</label>
                    <input type="text" class="form-control" id="nuevoRuc" name="nuevoDescripcion" placeholder="">
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Dirección</label>
                  <input type="text" class="form-control" id="nuevoDireccion" name="nuevoDireccion" placeholder="">
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Teléfono</label>
                  <input type="text" class="form-control" id="nuevoTelefono" name="nuevoDescripcion" placeholder="">
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Correo</label>
                  <input type="text" class="form-control" id="nuevoCorreo" name="nuevoDescripcion" placeholder="">
                </div>                 
                <div class="form-check mb-3">
                  <input class="form-check-input" type="checkbox" value="1" id="nuevoSuscrito" name="nuevoSuscrito">
                  <label class="form-check-label" for="nuevoSuscrito">
                    Seleccione esta casilla si el cliente va a estar suscrito
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

  <!-- Modal Editar Cliente -->
  <div class="modal fade" id="modalEditarCliente" tabindex="-1" aria-labelledby="modalEditarClienteLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Cliente</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form id="formEditCliente" enctype="multipart/form-data" role="form">
          @method('PUT')
          <input type="hidden" name="idEditarCliente" id="idEditarCliente">
            <div class="modal-body">

              <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nombre del Cliente</label>
                    <input type="text" class="form-control" id="editarNombre" name="editarNombre" placeholder="">
                </div>                
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">RUC</label>
                    <input type="text" class="form-control" id="editarRuc" name="editarDescripcion" placeholder="">
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Dirección</label>
                  <input type="text" class="form-control" id="editarDireccion" name="editarDireccion" placeholder="">
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Teléfono</label>
                  <input type="text" class="form-control" id="editarTelefono" name="editarDescripcion" placeholder="">
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Correo</label>
                  <input type="text" class="form-control" id="editarCorreo" name="editarDescripcion" placeholder="">
                </div>                 
                <div class="form-check mb-3">
                  <input class="form-check-input" type="checkbox" value="1" id="editarSuscrito" name="editarSuscrito">
                  <label class="form-check-label" for="editarSuscrito">
                    Seleccione esta casilla si el cliente va a estar suscrito
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