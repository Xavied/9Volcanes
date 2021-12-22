<x-app-layout>
    <div>
        <br>
        <!-- Buscador -->
        <br>
        <div class="row justify-content-end">
            <div class="col-md-8 col-sm-12">
                <form id="searchForm" class="form-inline">
                    <div class="input-group mb-3">
                        <input id="buscar_emprendimiento" name="buscar_emprendimiento" type="text" class="form-control"
                            placeholder="Buscar emprendimientos por nombre..." aria-label="Recipient's username"
                            aria-describedby="button-addon2">
                        <button class="btn btn-secondary" type="submit" id="button-addon2">Buscar</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Buscador -->
        <div class="row justify-content center">
            <div class="col">
                <div class="card ">
                    <div class="card-header">
                        Emprendimientos
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-sm btn-primary float-end" data-bs-toggle="modal"
                            data-bs-target="#modalNuevoEmprendimientos">
                            Crear
                        </button>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th colspan="2">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($emprendimientos as $emprendimiento)
                                    <tr>
                                        <td>{{ $emprendimiento->id }}</td>
                                        <td>{{ $emprendimiento->nombre }}</td>
                                        <td>
                                            <form name="formPoblarEmprendimiento" enctype="multipart/form-data"
                                                role="form">
                                                <input type="hidden" value="{{ $emprendimiento->id }}"
                                                    name="idPoblarEmprendimiento">
                                                <button type="submit" class="btn btn-sm btn-outline-primary"
                                                    data-bs-toggle="modal" data-bs-target="#modalEditarEmprendimiento">
                                                    Editar
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form name="formDestroyEmprendimiento" enctype="multipart/form-data"
                                                role="form">
                                                @method('DELETE')
                                                <input type="hidden" value="{{ $emprendimiento->id }}}"
                                                    name="idEliminarEmprendimiento">
                                                <button type="submit"
                                                    class="btn btn-sm btn-outline-danger">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>

                </div>

            </div>
        </div>
        <br>
    </div>

    @include('EmprendimientosAdmin.createmodalEmprendimiento')
</x-app-layout>
