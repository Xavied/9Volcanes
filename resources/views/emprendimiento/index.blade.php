<x-guest-layout>
    <div class="container">
<div class="container d-flex flex-wrap">
        @foreach($emprendimientos as $emprendimiento)
        <div class="card col-sm-4">

            <div class="mt-3 text-center bg_image">
            </div>

            <div class="card-body">
                <h5 class="card-title">{{$emprendimiento->nombre}}</h5>
            </div>

            <div class="card-footer">
                <a href="#">Ver más</a>
            </div>

        </div>
        @endforeach
    </div>
    </div>
</x-guest-layout>