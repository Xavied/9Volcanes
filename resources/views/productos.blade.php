@extends('bladeborrar')

@section('contenido')
<div class="container">
    <div class="row gy-3 justify-content-center">
        @foreach ($productos as $producto)
            <div class="col-md-3 col-sm-5">            
                <div class="card text-center shadow">    
                    <img src="{{url('/storage').'/'.$producto->Imagenes->first()->url}}" class="card-img-top" alt="...">   
                                                    
                    <div class="card-body">
                      <h5 class="card-title">{{ $producto->nombre }}</h5>
                      <p class="card-text">${{ $producto->precio }}</p>
                      <a href="{{route('producto', $producto) }}" class="btn btn-success">Ver Producto</a>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-auto">
                    {{$productos->links("pagination::bootstrap-4")}}
                </div>
                
            </div>
            
        </div>       
    </div>
</div>
@endsection