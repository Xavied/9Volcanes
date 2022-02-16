<?php

namespace App\Http\Livewire\Admin;

use App\Models\numeroTelefono;
use Livewire\Component;

class EditarTelefono extends Component
{   
    public $telefono_id;
    public $numero_de_telefono;
    
    public function mount(){
      $telefono = numeroTelefono::get()->first();
      $this->telefono_id = $telefono->id;
      $this->numero_de_telefono = $telefono->numero_de_telefono;
    }
    
    public function actualizar(){
        $telefono = numeroTelefono::findOrFail($this->telefono_id);
        $telefono->numero_de_telefono = $this->numero_de_telefono;
        $telefono->save();
    }
    
    public function render()
    {
        return view('livewire.admin.editar-telefono');
    }
    
}
