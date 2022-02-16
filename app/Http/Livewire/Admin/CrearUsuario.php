<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class CrearUsuario extends Component
{
  public $name, $email, $password, $password_confirmation, $is_admin;

  protected $rules = [
    'name' => 'required|string|max:255',
    'email' => 'required|string|email|max:255|unique:users',
    'password' => 'required|string|min:8|confirmed',
  ];
  
  public function save()
  {
    $this->validate();

    $user = User::create([
      'name' => $this->name,
      'email' => $this->email,
      'password' => bcrypt($this->password),
    ]);
    if ($this->is_admin) {
      $user->assignRole('Administrador');
    }

    $this->limpiarCampos();
    $this->emit('creado', 'Usuario creado con éxito');
    return redirect()->route('admin.usuarios');
  }
  
  public function limpiarCampos()
  {
    $this->reset(['name', 'email', 'password']);
  }

  
    public function render()
    {
        return view('livewire.admin.crear-usuario');
    }
}
