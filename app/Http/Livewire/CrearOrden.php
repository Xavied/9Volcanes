<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

use App\Models\Ciudad;
use App\Models\Orden;
use App\Models\Provincia;

use Livewire\Component;

class CrearOrden extends Component
{
    public $tipo_de_envio;
    public $costo_de_envio = 0;
    
    public $provincias, $provincia_id = '';
    public $ciudades = [], $ciudad_id = '';
    
    public $contacto;
    public $telefono;
    public $direccion;
    public $referencia;
    
    public $rules = [
      'contacto' => 'required',
      'telefono' => 'required',
      'tipo_de_envio' => 'required',
    ];
    
    public function updatedTipoDeEnvio($tipo_de_envio){
        if($tipo_de_envio == 1){
            $this->resetValidation([
                'provincia_id',
                'ciudad_id',
                'direccion',
                'referencia',
            ]);
        }
    }
    
    public function updatedProvinciaId($provincia_id){
        $this->ciudades = Ciudad::where('provincia_id',$provincia_id)->get();
        $this->reset(['ciudad_id']);
    }
    
    public function updatedCiudadId($ciudad_id){
        $ciudad = Ciudad::findOrFail($ciudad_id);
        $this->costo_de_envio = $ciudad->costo;
    }
    
    public function crearOrden(){
        $rules = $this->rules;
        if ($this->tipo_de_envio == 2) {
          $rules['provincia_id'] = 'required';
          $rules['ciudad_id'] = 'required';
          $rules['direccion'] = 'required';
          $rules['referencia'] = 'required';
        }
        $this->validate($rules);
        
        $orden = new Orden();
        $orden->user_id = Auth::user()->id;
        $orden->contacto = $this->contacto;
        $orden->telefono = $this->telefono;
        $orden->tipo_de_envio = $this->tipo_de_envio;
        $orden->costo_de_envio = 0;
        $orden->total = $this->costo_de_envio + Cart::subtotal();
        $orden->contenido = Cart::content();
          
        if ($this->tipo_de_envio == 2) {
          $orden->costo_de_envio = $this->costo_de_envio;
          $orden->provincia_id = $this->provincia_id;
          $orden->ciudad_id = $this->ciudad_id;
          $orden->direccion_de_envio = $this->direccion;
          $orden->referencia = $this->referencia;
        }
      
        $orden->save();
        
        foreach (Cart::content() as $producto) {
          reducirCantidad($producto);
        }
    
        Cart::destroy();
        
        return redirect()->route('ordenes.pagar',$orden);
    }
    
    public function mount(){
        $this->provincias = Provincia::all(); 
    }
  
    public function render()
    {
        return view('livewire.crear-orden');
    }
}
