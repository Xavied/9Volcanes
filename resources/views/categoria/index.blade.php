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
                                    <a class="btn btn-primary btn-sm float-right"
                                        data-placement="left" data-bs-toggle="modal" data-bs-target="#modalNuevoProducto">
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
                                            <th>Img</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categorias as $categoria)
                                            <tr>
                                                <td>{{ ++$i }}</td>

                                                <td>{{ $categoria->nombre }}</td>
                                                <td>{{ $categoria->slug }}</td>
                                                <td>{{ $categoria->img }}</td>

                                                <td>
                                                    <form action="{{ route('categoria.destroy', $categoria->id) }}"
                                                        method="POST">
                                                        <a class="btn btn-sm btn-outline-primary "
                                                            href="{{ route('categoria.show', $categoria->id) }}"><i
                                                                class="fa fa-fw fa-eye"></i> Ver</a>
                                                        <a class="btn btn-sm btn-outline-success"
                                                            data-bs-toggle="modal" data-bs-target="#modalEditProducto"><i
                                                                class="fa fa-fw fa-edit"></i> Editar</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger btn-sm"><i
                                                                class="fa fa-fw fa-trash"></i> Eliminar</button>
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
