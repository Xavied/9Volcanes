<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;

class ProductosDatos extends Component
{
    public $producto;
    public $qty = 1;
    public $quantity;
    
    public $option =[];
    
    public function mount(Producto $producto){
        $this->producto = $producto;
        $this->quantity = cantidad_disponible($this->producto->id);
        $this->option['image'] = $this->producto->Imagenes->first()->url;
    }
    
    public function disminuir()
    {
        if ($this->qty == 1) {
          return;
        }
        $this->qty--;
    }
    public function aumentar()
    {
        if ($this->qty == $this->quantity) {
            return;
        }
        $this->qty++;
    }
    
    public function agregarItem(){
        Cart::add([ 
            'id' => $this->producto->id, 
            'name' => $this->producto->nombre,
            'qty' => $this->qty,
            'price' => $this->producto->precio,
            'weight' => 550,
            'options'=> $this->option
        ]);
        
        $this->quantity = cantidad_disponible($this->producto->id);
        
        $this->reset('qty');
        
        $this->emitTo('carrito','render');
    }
    
    public function render()
    {
        return view('livewire.productos-datos');
    }
}
