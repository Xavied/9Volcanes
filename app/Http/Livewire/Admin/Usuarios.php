<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Usuarios extends Component
{
    public $busqueda;
    public $id_user;
    public $modalEliminar = false;
    
    public function abrirModalEliminar()
    {
      $this->modalEliminar = true;
    }
    public function cerrarModalEliminar()
    {
      $this->modalEliminar = false;
      $this->limpiarCampos();
    }
  
    public function limpiarCampos()
    {
      $this->reset(['id_user']);
    }
  
    public function destroy($id)
    {
      $this->abrirModalEliminar();
      $this->modalEliminar = true;
      $this->id_user = $id;
    }
  
    public function destroyConfirmed()
    {
      User::findOrFail($this->id_user)->delete();
      $this->cerrarModalEliminar();
      $this->emit('eliminado', 'Usuario eliminado de manera éxitosa');
    }
  
    public function render()
    {
        $usuarios = User::where('name', 'like', '%' . $this->busqueda . '%')->get();
        return view('livewire.admin.usuarios',compact('usuarios'))->layout(
          'layouts.app'
        );;
    }
}
