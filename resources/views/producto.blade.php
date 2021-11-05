@extends('bladeborrar')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                <img src="{{url('/storage').'/'.$producto->Imagenes->first()->url}}" class="card-img-top" alt="..."> 
                <div class="card-body">
                    <h5 class="card-title">{{ $producto->nombre }}</h5>
                    <p class="card-text">{{ $producto->descripcion }}</p>
                    <p class="card-text">{{ $producto->marca->nombre }}</p>
                    <p class="card-text">{{ $producto->categoria->nombre }}</p>
                    <p class="card-text">${{ $producto->precio }}</p>
                </div>
            </div> 
            
        </div>
    </div>
</div>
@endsection

