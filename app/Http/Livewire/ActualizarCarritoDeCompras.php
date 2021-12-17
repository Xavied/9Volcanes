<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ActualizarCarritoDeCompras extends Component
{
    
    public $rowId, $qty, $quantity;
    
    public function mount(){
        $item = Cart::get($this->rowId);
        $this->qty = $item->qty;
        
        $this->quantity = cantidad_disponible($item->id);
    }
    
    public function disminuir()
    {
        if ($this->qty == 1) {
          return;
        }
        $this->qty--;
        Cart::update($this->rowId, $this->qty);
        $this->emit('render');
    }
    public function aumentar()
    {
        if ($this->qty == $this->quantity) {
            return;
        }
        $this->qty++;
        Cart::update($this->rowId, $this->qty);
        $this->emit('render');
    }
    
    public function render()
    {
        return view('livewire.actualizar-carrito-de-compras');
    }
}
