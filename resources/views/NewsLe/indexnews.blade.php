@extends('NewsLe.news')
@extends('layouts.plantilla')
<!-- sección head -->
@section('head')
    <title>9Volcanes</title>
@endsection
<!-- Fin sección head -->

<!-- sección menú -->
@section('navigation')
    
@endsection
<!-- Fin sección menú -->

@section('content')
<br>
    <div>
        <form method="POST" action="{{route('newsletter')}}">
            {{ csrf_field() }}
        <div class="row">
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>
        </div>
        </form>
    </div>
@endsection
<div>
    <!-- sección news -->
    @section('news')
    @endsection
    <!-- Fin sección news -->
</div>