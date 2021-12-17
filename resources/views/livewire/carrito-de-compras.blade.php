<div>
    <h2 class="ms-3">Mi carrito</h2>
    
    @if (Cart::count())
        <div class="ms-3">
            <table class="table {{-- table-bordered --}}">
                <thead class="bg-success text-white">
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                </thead>
                <tbody>
                    @foreach (Cart::content() as $item )
                    <tr>
                        <td>
                            <div>
                                <img src="{{ asset('storage/'.$item->options->image) }}" alt="" class="" style="width: 200px; height: auto; object-fit: cover">
                                {{ $item->name }}   
                            </div>
                        </td>
                        <td class="{{-- d-flex align-items-center --}}">
                            <div>
                                {{ $item->price }}$
                                <button class="btn btn-danger" wire:click="delete('{{ $item->rowId }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="24" height="24" viewBox="0 0 24 24"><path d="M3 6v18h18v-18h-18zm5 14c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm5 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm5 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm4-18v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.315c0 .901.73 2 1.631 2h5.712z"/></svg>
                                </button>
                            </div>
                        </td>
                        <td>
                            @livewire('actualizar-carrito-de-compras',['rowId' =>$item->rowId ], key($item->id) )
                           
                        </td>
                        <td>{{ $item->price*$item->qty }}$</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td>Total a pagar:</td>
                        <td></td>
                        <td></td>
                        <td>{{ Cart::subTotal() }} $</td>
                    </tr>
                </tbody>
            </table>
            <div class="d-flex justify-content-between">
                <button class="btn btn-danger mb-3" wire:click="destroy()">
                    Borrar carrito de compras 
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="24" height="24" viewBox="0 0 24 24"><path d="M3 6v18h18v-18h-18zm5 14c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm5 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm5 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm4-18v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.315c0 .901.73 2 1.631 2h5.712z"/></svg>
                </button>
                <a class="btn btn-success mb-3" href="{{ route('ordenes.crear') }}">
                    Continuar con la compra 
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="25" height="25" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 487.6 487.6" style="enable-background:new 0 0 487.6 487.6;" xml:space="preserve">
                        <g>
                            <path d="M460.3,216.55h-11.6v-69.7c0-28.5-23.2-51.6-51.6-51.6h-10.7l0.1-25.9c0-19.2-15.6-34.8-34.8-34.8H42.3   c-23.1,0-42,18.6-42.3,41.7c0,0.2,0,0.4,0,0.6v341.4c0,19.2,15.6,34.8,34.8,34.8h362.4c28.5,0,51.6-23.2,51.6-51.6v-69.8h11.6   c15,0,27.2-12.2,27.2-27.2v-60.7C487.5,228.75,475.3,216.55,460.3,216.55z M42.3,58.55h309.4c5.9,0,10.8,4.8,10.8,10.7l-0.1,26   H42.3c-10.1,0-18.3-8.2-18.3-18.3S32.2,58.55,42.3,58.55z M424.7,401.35c0,15.2-12.4,27.6-27.6,27.6H34.7   c-5.9,0-10.8-4.8-10.8-10.8v-303.1c5.6,2.7,11.8,4.2,18.4,4.2h354.8c15.2,0,27.6,12.4,27.6,27.6v69.7h-81.9   c-15,0-27.2,12.2-27.2,27.2v60.7c0,15,12.2,27.2,27.2,27.2h81.9V401.35z M463.5,304.45c0,1.8-1.4,3.2-3.2,3.2H342.9   c-1.8,0-3.2-1.4-3.2-3.2v-60.7c0-1.7,1.4-3.2,3.2-3.2h117.4c1.7,0,3.2,1.4,3.2,3.2L463.5,304.45L463.5,304.45z"/>
                        </g>
                    </svg>
                </a>
            </div>
        </div>
    @else
        <div class="ms-3">
            <p class="text-center">
                No tiene productos agregados al todavía.
            </p>
        </div>
    @endif

</div>
