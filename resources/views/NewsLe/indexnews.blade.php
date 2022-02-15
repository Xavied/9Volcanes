<x-app-layout>
    <br>
        <div>

            <div style="justify-content: center; align-items: center;  display: flex;"  >
                <button type="button" class="btn btn-outline-success btn-block" data-bs-toggle="modal"
                data-bs-target="#modalNuevoNews">
                CREAR UN NUEVO NEWSLETTER
                </button>
            </div>

        </div>
        <br>
        <div class="modal fade" id="modalNuevoNews" tabindex="-1" aria-labelledby="modalNuevoNews" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalNuevoNewsabel">Crear Nuevo Newsletter</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
        
                <form id="formSendNews" name="formSendNews" enctype="multipart/form-data" role="form">
                    @method('POST')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="x" class="form-label">Título del Newsletter</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="">
                            <p class="invalid-feedback" id="error-titulo"></p>
                        </div>                
                        <div class="mb-3">
                            <label for="x" class="form-label">Mensaje del Newsletter</label>
                            <textarea class="form-control" id="mensaje" name="mensaje" rows="3"></textarea>
                            <p class="invalid-feedback" id="error-mensaje"></p>
                        </div>    
                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Selecciona el Newsletter: </label>
                            <input class="form-control" type="file" id="imagen" name="imagen" multiple accept="image/png, image/jpeg, image/jpg, image/svg">
                            <p class="invalid-feedback" id="error-imagen"></p>
                        </div>                   
                    </div>
                    <div class="modal-footer">
                      <button id= "CancelenviarnewsButton" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                      <button id= "enviarnewsButton" type="submit" class="btn btn-primary">ENVIAR</button>
                    </div>

                </form>
        
              </div>
            </div>
        </div>

    </x-app-layout>