<?php

namespace App\Http\Livewire\Admin;

use App\Models\Orden;
use Livewire\Component;

class ActualizarOrdenEstado extends Component
{
    protected $listeners = ['refresh','$refresh'];
    
    public $orden, $estado;
    
    public function mount(Orden $orden){
        $this->orden = $orden;
        $this->estado = $orden->estado;
    }
    
    public function render(){
        $productos = json_decode($this->orden->contenido);
        return view('livewire.admin.actualizar-orden-estado', compact(['productos']));
    }
    
    public function actualizarEstado(){
        $this->orden->estado = $this->estado;
        $this->orden->save();
        $this->emitTo('actualizar-orden-estado', 'refresh');
    }
}
