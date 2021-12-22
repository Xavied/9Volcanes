<div>
    <h4 class="text-center">PROCESAR PAGO DE LA ORDEN N°{{ $orden->id }}</h4>
    <div class="row">
        <div class="col-sm">
            <h4>Datos de envío:</h4>
            @if ($orden->tipo_de_envio==1)
            <p>
                Los productos deben ser recogidos en la tienda
            </p>
            @else
            <h6>Los productos seran enviados a las siguiente dirección:</h6>
            <h6>{{ $orden->direccion_de_envio }}</h6>
            <h6>{{ $orden->referencia }}</h6>
            @endif
        </div>
        <div class="col-sm">
            <h4>Datos de contacto:</h4>
            <h6>Destinatario: {{ $orden->contacto }}</h6>
            <h6>Teléfono de contacto: {{ $orden->telefono }}</h6>
        </div>
    </div>
    <h4 class="text-center">Resumen</h4>
    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto )
                <tr>
                    <td>
                        <img src="{{ asset('storage/'.$producto->options->image) }}" alt="" class="d-none d-sm-block" style="width: 200px; height: auto; object-fit: cover">
                        {{ $producto->name }}  
                    </td>
                    <td class="text-center">{{ $producto->price }}$</td>
                    <td class="text-center">
                        {{$producto->qty  }}
                    </td>
                    <td class="text-center">
                        {{ $producto->price * $producto->qty}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center mb-3">
        <button class="btn btn-warning" wire:click="pagar()">Pagar con tarjeta de credito/debito</button>
    </div>
</div>
