@php

    use App\Models\Config;
    $footerC1 = Config::where('id', '=', 1)->get();   
    foreach ($footerC1 as $foot) {
        $titleC1 = $foot->titulo;
    }

    $footerC2 = Config::where('id', '=', 2)->get();
    foreach ($footerC2 as $foot) {
        $titleC2 = $foot->titulo;
    }

@endphp
<div class="modal fade" id="modalNuevaColumna1" tabindex="-1" aria-labelledby="modalNuevaColumna1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalNuevaColumna1">Modifcar Columna "{{$titleC1}}"</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form id="formEditFooter1" name="formEditFooter1" enctype="multipart/form-data" role="form">
            @method('POST')
            <div class="modal-body">
                <div class="mb-3">
                    <label for="x" class="form-label">Título de la Columna</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="">
                    <p class="invalid-feedback" id="error-titulo"></p>
                </div>                
                <div class="mb-3">
                    <label for="x" class="form-label">Descripción de la columna</label>
                    <textarea class="form-control" id="cuerpo" name="cuerpo" rows="3"></textarea>
                    <p class="invalid-feedback" id="error-cuerpo"></p>
                </div>    
                <input type="hidden"  id="id" name="id" value="1">                   
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>

      </div>
    </div>
</div>

<!--Columna 2-->
<div class="modal fade" id="modalNuevaColumna2" tabindex="-1" aria-labelledby="modalNuevaColumna2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalNuevaColumna2">Modifcar Columna "{{$titleC2}}"</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form id="formEditFooter2" name="formEditFooter2" enctype="multipart/form-data" role="form">
            @method('POST')
            <div class="modal-body">
                <div class="mb-3">
                    <label for="x" class="form-label">Título de la Columna</label>
                    <input type="text" class="form-control" id="titulo2" name="titulo2" placeholder="">
                    <p class="invalid-feedback" id="error-titulo2"></p>
                </div>                
                <div class="mb-3">
                    <label for="x" class="form-label">Descripción de la columna</label>
                    <textarea class="form-control" id="cuerpo2" name="cuerpo2" rows="3"></textarea>
                    <p class="invalid-feedback" id="error-cuerpo2"></p>
                </div>  
                <input type="hidden" id="id" name="id" value="2">                     
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>

      </div>
    </div>
</div>

{{-- <!--Columna 3-->
<div class="modal fade" id="modalNuevaColumna3" tabindex="-1" aria-labelledby="modalNuevaColumna3" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalNuevaColumna3">Modifcar Columna 3</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form id="formEditFooter3" name="formEditFooter3" enctype="multipart/form-data" role="form">
            @method('POST')
            <div class="modal-body">
                <div class="mb-3">
                    <label for="x" class="form-label">Título de la Columna</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="">
                    <p class="invalid-feedback" id="error-titulo"></p>
                </div>                
                <div class="mb-3">
                    <label for="x" class="form-label">Descripción de la columna</label>
                    <textarea class="form-control" id="cuerpo" name="cuerpo" rows="3"></textarea>
                    <p class="invalid-feedback" id="error-cuerpo"></p>
                </div>            
                <input type="hidden"  id="id" name="id" value="3">           
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>

      </div>
    </div>
</div> --}}