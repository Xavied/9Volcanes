@extends('layouts/plantilla')

@section('content')

<div class="container">
    <br>
    <div class="row">

        <!-- Sección Categorías -->
        <div class="col">
            <br>
            <div class="list-group">
                <a class="list-group-item list-group-item-action disabled"><h5>CATEGORÍAS</h5></a>
                <a href="{{route('productos') }}" class="list-group-item list-group-item-action" aria-current="true">
                    <div class="d-flex w-100 justify-content-between">
                        <h6 class="mb-1">Todos los productos</h6>
                        <small><span class="badge bg-success rounded-pill">{{$total}}</span></small>                        
                    </div>
                    </a>
                @foreach ($categoriastodas as $categorialista) 
                    @if ($categorialista == $categoria)
                        <a href="{{route('categoria', $categorialista) }}" class="list-group-item list-group-item-action list-group-item-success" aria-current="true">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">{{$categorialista->nombre}}</h6>
                                <small><span class="badge bg-success rounded-pill">{{$categorialista->productos->count()}}</span></small>                        
                            </div>
                        </a>  
                    @else
                        <a href="{{route('categoria', $categorialista) }}" class="list-group-item list-group-item-action" aria-current="true">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">{{$categorialista->nombre}}</h6>
                                <small><span class="badge bg-success rounded-pill">{{$categorialista->productos->count()}}</span></small>                        
                            </div>
                        </a>                        
                    @endif                    
                @endforeach 
            </div>
        </div>  
        <!-- End Sección Categorías -->

        <div class="col-md-9 col-sm-12">

            <!-- Nombre de Categoría y cantidad de productos -->
            <br>
            <div class="row justify-content-around">
                <div class="col-auto">                    
                    <h5>Categoría   {{$categoria->nombre}}</h5>
                </div>
                <div class="col-auto">                    
                    <p class="text-secondary">Hay {{$categoria->productos->count()}} productos</p>
                </div>
            </div>
            <br>
            <!-- End Nombre de Categoría y cantidad de productos -->

            <!-- Productos de categoría -->
            <div class="container">
                <div class="row gy-3 justify-content-center">
                    @foreach ($categoria->productos as $producto)
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
                                        
                        </div>  
                        <br><br>          
                    </div>       
                </div>
            </div>
            <!-- End Productos de categoría -->
        </div>
    </div>
</div>
@endsection