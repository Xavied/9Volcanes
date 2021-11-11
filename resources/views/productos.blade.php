@extends('layouts/plantilla')

@section('content')

<!--Breadcrumb página productos-->
<br>
<div class="breadtop">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Productos</li>
        </ol>
    </nav>
</div>
<!-- Fin Breadcrumb página productos-->

<div class="container">
    <br>
    <div class="row">
        <!-- Sección Categorías -->
        <div class="col">
            <br>
            <div class="list-group">
                <a class="list-group-item list-group-item-action disabled"><h5>CATEGORÍAS</h5></a>
                <a href="{{route('productos') }}" class="list-group-item list-group-item-action list-group-item-success" aria-current="true">
                    <div class="d-flex w-100 justify-content-between">
                        <h6 class="mb-1">Todos los productos</h6>
                        <small><span class="badge bg-success rounded-pill">{{$total}}</span></small>                        
                    </div>
                    </a>
                @foreach ($categorias as $categoria) 
                    <a href="{{route('categoria', $categoria) }}" class="list-group-item list-group-item-action" aria-current="true">
                    <div class="d-flex w-100 justify-content-between">
                        <h6 class="mb-1">{{$categoria->nombre}}</h6>
                        <small><span class="badge bg-success rounded-pill">{{$categoria->productos->count()}}</span></small>                        
                    </div>
                    </a>
                @endforeach 
            </div>
        </div>  
        <!-- End Sección Categorías -->
                
        <div class="col-md-9 col-sm-12">

            <!-- Buscador -->
            <br>
            <div class="row justify-content-end">  
                <div class="col-md-8 col-sm-12">
                    <form id="searchForm" class="form-inline">
                        <div class="input-group mb-3">
                            <input id="buscar_producto" name="buscar_producto" type="text" class="form-control" placeholder="Buscar productos por nombre..." aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-secondary" type="submit" id="button-addon2">Buscar</button>                            
                        </div>      
                    </form>
                </div>                    
            </div>         
            <!-- End Buscador -->

            <!-- Productos -->
            <br>
            <div class="container">
                <div class="row gy-3 justify-content-center">
                    @foreach ($productos as $producto)
                        <div class="col-md-4 col-sm-12">            
                            <div class="card text-center shadow" style="width: 100%;">    
                                <img src="{{url('/storage').'/'.$producto->Imagenes->first()->url}}" class="card-img-top" alt="...">   
                                                                
                                <div class="card-body">
                                  <h6 class="card-title">{{ $producto->get_nombre}}</h6>
                                  <p class="card-text">${{ $producto->precio }}</p>
                                  <a href="{{route('producto', $producto) }}" class="btn btn-success">Ver Producto</a>
                                </div>
                            </div>
                        </div>
                    @endforeach                    
                    <div class="container">
                        <br><br>
                        <div class="row justify-content-end">
                            <div class="col-auto">
                                {{$productos->links("pagination::bootstrap-4")}}
                            </div>                
                        </div>  
                        <br><br>          
                    </div>       
                </div>
            </div>
            <!-- End Productos -->
        </div>
    </div>    
</div>

@endsection