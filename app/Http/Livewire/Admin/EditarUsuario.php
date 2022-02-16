<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class EditarUsuario extends Component
{
  public $user;

  public $user_id,
    $name,
    $email,
    $password,
    $password_confirmation,
    $is_admin = false;

  protected $rules = [
    'name' => 'required|string|max:255',
    'email' => 'required|string|email|max:255|unique:users',
  ];

  protected $listeners = ['refresh' => '$refresh'];

  public function mount($id)
  {
    $this->user = User::findOrFail($id);
    $this->user_id = $this->user->id;
    $this->name = $this->user->name;
    $this->email = $this->user->email;
  }

  public function update()
  {
    $rules = $this->rules;
    $rules['email'] = 'required|unique:users,email,' . $this->user->id;
    if ($this->password) {
      $rules['password'] = 'required|string|min:8|confirmed';
    }
    $this->validate($rules);

    $user = User::findOrFail($this->user_id);
    $user->name = $this->name;
    $user->email = $this->email;
    $user->password = bcrypt($this->password);
    $user->save();

    $this->limpiarCampos();
    return redirect()->route('admin.usuarios');
  }

  public function limpiarCampos()
  {
    $this->reset(['password', 'password_confirmation']);
    $this->emit('refresh');
  }

  
    public function render()
    {
        return view('livewire.admin.editar-usuario');
    }
}
