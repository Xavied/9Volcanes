<?php

namespace App\Http\Livewire\Admin;

use App\Models\direccionTienda;
use Livewire\Component;

class EditarDireccion extends Component
{   
    public $latitud;
    public $longitud;
    public $direccion_id;
    
    protected $rules = [
      'latitud' => 'required',
      'longitud' => 'required',
    ];
    
    public function actualizar(){
      $this->validate();
      
      $direccion = direccionTienda::findOrFail($this->direccion_id);
      $direccion->latitud = $this->latitud;
      $direccion->longitud = $this->longitud;
      $direccion->save();
      
    }
  
    public function mount(){
        $direccion = direccionTienda::get()->first();
        
        $this->latitud = $direccion->latitud;
        $this->longitud = $direccion->longitud;
        $this->direccion_id = $direccion->id;
    }
  
    public function render()
    {
        return view('livewire.admin.editar-direccion');
    }
}
