<div class="container-fluid my-4">
    <div class="row">
        <div class="col-sm">
            <label>Nombre de contacto:</label>
            <input type="text" name="" class="form-control" wire:model.defer="contacto">
            @error('contacto')
                <span class="form-contro text-danger">
                    Es necesario agregar el nombre de contacto.
                </span><br>
            @enderror
            <label>Teléfono de contacto</label>
            <input type="number" name="" class="form-control" wire:model.defer="telefono" minlength="9">
            @error('telefono')
                <span class="form-contro text-danger">
                    Es necesario agregar el teléfono de contacto.
                </span><br>
            @enderror
            <label>Tipo de envio:</label><br>
            <div x-data="{tipo_de_envio : @entangle('tipo_de_envio')}">            
                
                <div class="form-check">
                    <input class="form-check-input" type="radio" x-model="tipo_de_envio" name="tipo_de_envio" value="1">
                    <label class="form-check-label" for="flexRadioDefault1">
                      Retiro en tienda
                    </label>
                </div>

                {{-- <div class="form-check">
                    <input class="form-check-input" type="radio" x-model="tipo_de_envio" name="tipo_de_envio" value="2">
                    <label class="form-check-label" for="flexRadioDefault2">
                      Envio a domicilio
                    </label>
                </div> --}}
                                
                <div class="mt-4" :class="{'d-none': tipo_de_envio != 2 }">    
                    <label>Provincia</label>
                    <select class="form-select" wire:model="provincia_id">
                        <option value="" disabled selected>Seleccione la provincia</option>
                        @foreach ($provincias as $provincia)
                        <option value="{{ $provincia->id }}">
                            {{ $provincia->nombre }}    
                        </option>
                        @endforeach
                    </select>
                    @error('provincia_id')
                    <span class="form-contro text-danger">
                        Es necesario seleccionar una provincia.
                    </span><br>
                    @enderror
                    <label>Ciudad</label>
                    <select class="form-select" wire:model="ciudad_id">
                        <option value="" disabled selected>Seleccione la ciudad</option>
                        @foreach ($ciudades as $ciudad)
                        <option value="{{ $ciudad->id }}">
                            {{ $ciudad->nombre }}  
                        </option>
                        @endforeach
                    </select>
                    @error('ciudad_id')
                    <span class="form-contro text-danger">
                        Ese necesario seleccionar una ciudad.
                    </span><br>
                    @enderror
                    <label>Dirección de envio</label>
                    <input type="text" name="" class="form-control" wire:model.defer="direccion">
                    @error('direccion')
                    <span class="form-contro text-danger">
                        Ese necesario agregar una dirección de envío.
                    </span><br>
                    @enderror
                    
                    <label>Referencias</label>
                    <input type="text" name="" class="form-control" wire:model="referencia">
                    @error('referencia')
                    <span class="form-contro text-danger">
                        Es necesario agregar una referencia.
                    </span><br>
                    @enderror
                    <div class="mb-3"></div>
                </div>
            </div>
            
        </div>
        <div class="col-sm">
            <table class="table">
                <thead>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </thead>
                <tbody>
                    @foreach (Cart::content() as $item)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/'.$item->options->image) }}" alt="" style="width: 100px; height: auto; object-fit: cover">
                                {{ $item->name }}
                            </td>
                            <td>
                                {{ $item->price }}
                            </td>
                            <td>
                                {{ $item->qty }}
                            </td>
                            <td>
                                {{ $item->price*$item->qty }}
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>Envio:</td>
                        <td></td>
                        <td></td>
                        <td>
                            @if ($tipo_de_envio==1 ||$costo_de_envio==0) 
                            Gratis 
                            @else
                            {{ $costo_de_envio }}$ 
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Total a pagar:</td>
                        <td></td>
                        <td></td>
                        <td>{{ Cart::subTotal() + $costo_de_envio }} $</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="text-center text-sm-start">
        <a class="btn btn-success" 
            wire:loading.attr="disabled"
            wire:target="crearOrden"
            wire:click="crearOrden"
        >
            Continuar con la compra
        </a>
    </div>
</div>
