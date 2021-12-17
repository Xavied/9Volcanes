<!-- CREAR -->
<div class="modal fade" id="modalNuevoProducto" tabindex="-1" aria-labelledby="modalNuevoProductoLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Categoria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

           <!--<form method="POST" action="{{ route('categoria.store') }}" role="form" enctype="multipart/form-data">
           -->
                <form id="formStoreCategoria" enctype="multipart/form-data" role="form">
                    <div class="box box-info padding-1">
                        <div class="modal-body">

                            <div class="form-group">
                                {{ Form::label('nombre') }}
                                <input type="text" class="form-control" id="nuevoNombre" name="nuevoNombre" placeholder="">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            <!--</form>-->

        </div>
    </div>
</div>
<!-- update -->
<div class="modal fade" id="modalEditarCategoria" tabindex="-1" aria-labelledby="modalEditProductoLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Categoria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

           <!-- <form method="post" action="{{ route('categoria.update', $categoria->id) }}" role="form"
                enctype="multipart/form-data">-->
                

                <form id="formUpdateCategoria" enctype="multipart/form-data" role="form">
                    @method('PUT')
                    <input type="hidden" name="idEditarCategoria" id="idEditarCategoria">
                    <div class="box box-info padding-1">
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="editarNombre" class="form-label">Nombre del Producto</label>
                                <input type="text" class="form-control" id="editarNombre" name="editarNombre" placeholder="">
                            </div>                        
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            <!--</form>--->

        </div>
    </div>
</div>
