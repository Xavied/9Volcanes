  <!-- Modal Crear Emprendimiento -->
<div class="modal fade" id="modalNuevoEmprendimientos" tabindex="-1" aria-labelledby="modalNuevoEmprendimientoabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalNuevoEmprendimientoabel">Crear Emprendimiento</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form id="formStoreEmprendimiento" name="formStoreEmprendimiento" enctype="multipart/form-data" role="form">
          @method('POST')
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nombre del Emprendimiento</label>
                    <input type="text" class="form-control" id="nuevoNombre" name="nuevoNombre" placeholder="">
                </div>                
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Descripción del Emprendimiento</label>
                    <textarea class="form-control" id="nuevoDescripcion" name="nuevoDescripcion" rows="3"></textarea>
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
  <!-- Modal Editar Emprendimiento -->
  <div class="modal fade" id="modalEditarEmprendimiento"tabindex="-1" aria-labelledby="modalEditarEmprendimientoLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Emprendimiento</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form id="formEditEmprendimiento"  enctype="multipart/form-data" role="form">
          @method('PUT')
          <input type="hidden" name="idEditarEmprendimiento" id="idEditarEmprendimiento">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="editarNombre" class="form-label">Nuevo nombre del Emprendimiento</label>
                    <input type="text" class="form-control" id="editarNombre" name="editarNombre" placeholder="">
                </div>                
                <div class="mb-3">
                    <label for="editarDescripcion" class="form-label">Nueva descripción del Emprendimiento</label>
                    <textarea class="form-control" id="editarDescripcion" name="editarDescripcion" ></textarea>
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

                     
  
 