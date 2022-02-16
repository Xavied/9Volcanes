<div>
    <div>
        <h4 class="text-center text-uppercase">Orden N°{{ $orden->id }} (
         @switch($orden->estado) @case(1) Pendiente @break
         @case(2) Pagado @break @case(3) Enviado @break @case(4)
         Entregado @break @case(5) Anulado @break @default
         @endswitch)</h4>
         <div class="d-flex justify-content-around align-items-center mx-3">
            <div class="card  mb-3 {{ $orden->estado >= 2 && $orden->estado != 5 ? 'bg-dark text-white' : 'bg-light' }}">
                <div class="card-header">Pagado</div>
                <div class="card-body text-center">
                    <h1 class="card-title">
                        <i class="bi bi-box-seam"></i>
                    </h1>
                </div>
            </div>
            <div class="{{ $orden->estado >= 3 && $orden->estado != 5 ? 'bg-dark' : 'bg-light' }}" style="flex: 1 1 0%; height: 10px;"></div>
            <div class="card  mb-3 {{ $orden->estado >= 3 && $orden->estado != 5 ? 'bg-dark text-white' : 'bg-light' }}">
                <div class="card-header">Enviado</div>
                <div class="card-body text-center">
                    <h1 class="card-title">
                        <i class="bi bi-truck"></i>
                    </h1>
                </div>
            </div>
            <div class="{{ $orden->estado >= 4 && $orden->estado != 5 ? 'bg-dark' : 'bg-light' }}" style="flex: 1 1 0%; height: 10px;"></div>
            <div class="card  mb-3 {{ $orden->estado >= 4 && $orden->estado != 5 ? 'bg-dark text-white' : 'bg-light' }}">
                <div class="card-header">Recibido</div>
                <div class="card-body text-center">
                    <h1 class="card-title">
                        <i class="bi bi-house-door"></i>
                    </h1>
                </div>
            </div>
        </div>
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
    </div>
    <div class="card m-3">
        <div class="m-3">
            <h3 class="text-center">Actualizar estado de la orden</h3>
        </div>
        <div class="mx-3 mb-1">
            <form wire:submit.prevent="actualizarEstado">
                <div class="form-check form-check-inline">
                    <input wire:model="estado" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1">
                    <label class="form-check-label" for="inlineRadio1">Pendiente</label>
                </div>
                <div class="form-check form-check-inline">
                    <input wire:model="estado" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
                    <label class="form-check-label" for="inlineRadio2">Pagado</label>
                </div>
                <div class="form-check form-check-inline">
                    <input wire:model="estado" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3">
                    <label class="form-check-label" for="inlineRadio3">Enviado</label>
                </div>
                <div class="form-check form-check-inline">
                    <input wire:model="estado" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="4">
                    <label class="form-check-label" for="inlineRadio3">Entregado</label>
                </div>
                <div class="form-check form-check-inline">
                    <input wire:model="estado" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="5">
                    <label class="form-check-label" for="inlineRadio3">Anulado</label>
                </div>
                <button class="btn btn-primary float-end">Actualizar estado</button>
            </form>
        </div>
    </div>
</div>
