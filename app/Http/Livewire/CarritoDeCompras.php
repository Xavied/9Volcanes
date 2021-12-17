<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class CarritoDeCompras extends Component
{
    protected $listeners = ['render'];
    
    /* Elimina todos los elementos del carrito */
    public function destroy(){
        Cart::destroy();
        
        $this->emit('render');
    }
    
    /* Elimina un elemento en especifico del carrito */
    public function delete($rowId){
        Cart::remove($rowId);
        
        $this->emit('render');
    }
    
    public function render()
    {
        return view('livewire.carrito-de-compras');
    }
}
