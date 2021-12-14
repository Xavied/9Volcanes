<div class="modal fade" id="modalNuevoProducto" tabindex="-1" aria-labelledby="modalNuevoProductoLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="POST" action="{{ route('categoria.store') }}" role="form" enctype="multipart/form-data">
                @csrf

                <div class="box box-info padding-1">
                    <div class="modal-body">

                        <div class="form-group">
                            {{ Form::label('nombre') }}
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="">
                        </div>
                        <div class="form-group">
                            {{ Form::label('slug') }}
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="">
                        </div>
                        <div class="form-group">
                            {{ Form::label('img') }}
                            <input type="text" class="form-control" id="img" name="img" placeholder="">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>

<div class="modal fade" id="modalEditProducto" tabindex="-1" aria-labelledby="modalEditProductoLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="post" action="{{ route('categoria.update', $categoria->id) }}" role="form"
                enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                @csrf


                <div class="box box-info padding-1">
                    <div class="modal-body">

                        <div class="form-group">
                            {{ Form::label('nombre') }}
                            {{ Form::text('nombre', $categoria->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</p>') !!}
                        </div>
                        <div class="form-group">
                            {{ Form::label('slug') }}
                            {{ Form::text('slug', $categoria->slug, ['class' => 'form-control' . ($errors->has('slug') ? ' is-invalid' : ''), 'placeholder' => 'Slug']) }}
                            {!! $errors->first('slug', '<div class="invalid-feedback">:message</p>') !!}
                        </div>
                        <div class="form-group">
                            {{ Form::label('img') }}
                            {{ Form::text('img', $categoria->img, ['class' => 'form-control' . ($errors->has('img') ? ' is-invalid' : ''), 'placeholder' => 'Img']) }}
                            {!! $errors->first('img', '<div class="invalid-feedback">:message</p>') !!}
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>
