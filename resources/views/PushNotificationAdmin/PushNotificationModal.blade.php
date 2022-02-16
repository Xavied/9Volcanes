<div class="modal fade" id="modalNuevaNotificacion" tabindex="-1" aria-labelledby="modalNuevaNotificacion" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalNuevaNotificacionabel">Crear Notificación push</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form id="formSendNotication" name="formSendNotication" enctype="multipart/form-data" role="form">
            @method('POST')
            <div class="modal-body">
                <div class="mb-3">
                    <label for="x" class="form-label">Título de la Notificación</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="">
                    <p class="invalid-feedback" id="error-titulo"></p>
                </div>                
                <div class="mb-3">
                    <label for="x" class="form-label">Descripción de la notificación</label>
                    <textarea class="form-control" id="mensaje" name="mensaje" rows="3"></textarea>
                    <p class="invalid-feedback" id="error-mensaje"></p>
                </div>                       
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>

      </div>
    </div>
</div>