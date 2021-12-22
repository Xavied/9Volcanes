<x-app-layout>
<div>
    <br>
    <div class="row justify-content center">
        <div class="col">
            <br>
            <!-- Buscador -->
            <br>
            <div class="row justify-content-end">  
                <div class="col-md-8 col-sm-12">
                    <form id="searchForm" class="form-inline">
                        <div class="input-group mb-3">
                            <input id="buscar_producto" name="buscar_producto" type="text" class="form-control" placeholder="Buscar producto por nombre..." aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-secondary" type="submit" id="button-addon2">Buscar</button>                            
                        </div>      
                    </form>
                </div>                    
            </div>         
            <!-- End Buscador -->
            <div class="card ">
                <div class="card-header">
                    Productos
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-primary float-end" data-bs-toggle="modal" data-bs-target="#modalNuevoProducto">
                        Crear
                    </button>
                </div>
                <div class="card-body table-responsive-xxl">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productosindex as $producto)
                                <tr>
                                    <td>{{$producto->id}}</td>
                                    <td>{{$producto->nombre}}</td>
                                    <td>    
                                        <form name="formPoblarProducto" enctype="multipart/form-data" role="form">
                                            <input type="hidden" value="{{$producto->id}}" name="idPoblarProducto">
                                            <button type="submit" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalEditarProducto">
                                                Editar
                                            </button>                                            
                                        </form>                                        
                                    </td>
                                    <td>    
                                        <a href="{{route('editarImagenes', $producto) }}" class="btn btn-sm btn-outline-primary">Editar Imágenes</a>                                        
                                    </td>
                                    <td>
                                        <form name="formDestroyProducto" enctype="multipart/form-data" role="form">
                                            @method('DELETE')
                                            <input type="hidden" value="{{$producto->id}}" name="idEliminarProducto">
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


@include('adminProductos.modalesProductos')
</x-app-layout>