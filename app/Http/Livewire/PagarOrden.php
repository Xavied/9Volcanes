<?php

namespace App\Http\Livewire;

use App\Models\direccionTienda;
use App\Models\numeroTelefono;
use App\Models\Orden;
use Livewire\Component;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PagarOrden extends Component
{
    use AuthorizesRequests;
    public $orden;
    public $direccion;
    public $telefono;
    
    public function mount(Orden $orden, direccionTienda $direccion,numeroTelefono $telefono){
        $this->orden = $orden;
        $this->direccion = $direccion;   
        $this->telefono = $telefono;   
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
