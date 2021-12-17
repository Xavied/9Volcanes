@extends('layouts/plantilla')


@section('content')

    <div class="container">
        <br>
        <div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div style="display: flex; justify-content: space-between; align-items: center;">

                                <span id="card_title">
                                    {{ __('Categoria') }}
                                </span>

                                <div class="float-right">
                                    <a class="btn btn-primary btn-sm float-right" data-placement="left"
                                        data-bs-toggle="modal" data-bs-target="#modalNuevoProducto">
                                        {{ __('Crear') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="thead">
                                        <tr>
                                            <th>No</th>

                                            <th>Nombre</th>
                                            <th>Slug</th>

                                            <th colspan="2">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categorias as $categoria)
                                            <tr>
                                                <td>{{ $categoria->id }}</td>
                                                <td>{{ $categoria->nombre }}</td>
                                                <td>{{ $categoria->slug }}</td>

                                                <td>

                                                    <form name="formPoblarCategoria" enctype="multipart/form-data"
                                                        role="form">
                                                        <input type="hidden" value="{{ $categoria->id }}"
                                                            name="idPoblarCategoria">
                                                        <button type="submit" class="btn btn-sm btn-outline-primary"
                                                            data-bs-toggle="modal" data-bs-target="#modalEditarCategoria">
                                                            Editar
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form name="formDestroyCategoria" enctype="multipart/form-data"
                                                        role="form">

                                                        @method('DELETE')
                                                        <input type="hidden" value="{{ $categoria->id }}"
                                                            name="idEliminarCategoria">
                                                        <button type="submit" class="btn btn-outline-danger btn-sm">
                                                            Eliminar</button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {!! $categorias->links() !!}
                </div>
            </div>
        </div>
        <br>
    </div>
    @include('categoria.modalesCategorias')
@endsection
