<?php

namespace App\Http\Livewire;

use App\Models\Orden;
use Livewire\Component;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PagarOrden extends Component
{
    use AuthorizesRequests;
    public $orden;
    
    public function mount(Orden $orden){
        $this->orden = $orden;   
    }
    
    public function render()
    {
        $productos = json_decode($this->orden->contenido);
        return view('livewire.pagar-orden', compact(['productos']));
    }
    
    public function pagar(){
        $this->orden->estado = 2;
        $this->orden->save();
        
        return redirect()->route('ordenes.show', $this->orden);
    }
}
