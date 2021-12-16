@extends('layouts/plantilla')


@section('content')

<div class="container">
    <br>
    <!-- Buscador -->
    <br>
    <div class="row justify-content-end">  
        <div class="col-md-8 col-sm-12">
            <form id="searchForm" class="form-inline">
                <div class="input-group mb-3">
                    <input id="buscar_emprendimiento" name="buscar_emprendimiento" type="text" class="form-control" placeholder="Buscar emprendimientos por nombre..." aria-label="Recipient's username" aria-describedby="button-addon2">
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
                    <button type="button" class="btn btn-sm btn-primary float-end" data-bs-toggle="modal" data-bs-target="#modalNuevoEmprendimientos">
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
                                    <td>{{$emprendimiento->id}}</td>
                                    <td>{{$emprendimiento->nombre}}</td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-outline-primary"  data-bs-toggle="modal" data-bs-target="#modalEditmprendimientos{{$emprendimiento->id}}">Actualizar</a>
                                        <!-- Modal EDITAR -->
                                        <div class="modal fade" id="modalEditmprendimientos{{$emprendimiento->id}}" tabindex="-1" aria-labelledby="modalEditmprendimientosabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="modalEditmprendimientosabel">Editar Emprendimiento</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                        
                                                <form action="{{route('updateEmprendimientos')}}" enctype="multipart/form-data" method="POST">
                                                    @csrf
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="exampleFormControlInput1" class="form-label">Nuevo Nombre del Emprendimiento</label>
                                                                <input type="text" class="form-control" id="nuevoNombre" name="nuevoNombre" placeholder="{{$emprendimiento->nombre}}">
                                                            </div>                
                                                            <div class="mb-3">
                                                                <label for="exampleFormControlInput2" class="form-label">Nueva Descripción del Emprendimiento</label>
                                                                <textarea class="form-control" id="nuevoDescripcion" name="nuevoDescripcion" rows="3" placeholder="{{$emprendimiento->descripcion}}"></textarea>
                                                            </div>                       
                                                        </div>
                                                        <input type="hidden" value="{{$emprendimiento->id}}" id="idEditarEmprendimiento" name="idEditarEmprendimiento">
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                                        </div>
                                                </form>
                                        
                                            </div>
                                            </div>
                                        </div>            
                                    </td>
                                    <td>
                                        <form action="{{route('deleteEmprendimientos')}}" enctype="multipart/form-data" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{$emprendimiento->id}}" id="idEliminarEmprendimiento" name="idEliminarEmprendimiento">
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>                                            
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
@endsection