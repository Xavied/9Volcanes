<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-black">
  <h1 class="text-2xl text-center font-medium">Editar usuario</h1>
  <div class="bg-white shadow-md p-6 rounded-xl">
    <div class="grid">
      <label class="form-label" for="">Nombre:</label>
      <input class="form-control" type="text" placeholder="Inserte el nombre" wire:model="name" />
      @error('name')
      <span class="text-danger">
        {{ $message }}
      </span>
      @enderror
    </div>
    <div class="grid">
      <label class="form-label" for="">Correo electrónico:</label>
      <input class="form-control"
        type="email"
        placeholder="Inserte el correo electronico"
        wire:model="email"
      />
      @error('email')
      <span class="text-danger">
        {{ $message }}
      </span>
      @enderror
    </div>
    <div class="grid">
      <label class="form-label" for="">Contraseña:</label>
      <input class="form-control"
        type="password"
        placeholder="Inserte la contraseña"
        wire:model="password"
      />
      @error('password')
      <span class="text-danger">
        {{ $message }}
      </span>
      @enderror
    </div>
    <div class="grid">
      <label class="form-label" for="">Confirmar contraseña:</label>
      <input class="form-control"
        type="password"
        placeholder="Repita la contraseña"
        wire:model="password_confirmation"
      />
      @error('password')
      <span class="text-danger">
        {{ $message }}
      </span>
      @enderror
    </div>
    <div class="grid mt-2">
      @if($user->hasRole('Administrador'))
      <span class="text-indigo-700 text-lg">
        Este usuario es administrador 
      </span>
      @else
      <span class="text-green-900 text-lg">
        Este usuario es cliente 
      </span>
      @endif
    </div>
    <div class="grid grid-cols-2 gap-6 my-4">
      <a
        href="{{ route('admin.usuarios') }}"
        class="btn btn-danger"
        >Cancelar</a
      >
      <button
        class="btn btn-success"
        wire:loading.class.remove="btn-green"
        wire:loading.class="btn-green-loading"
        wire:loading.attr="disabled"
        wire:click="update"
      >
        Editar usuarrio
      </button>
    </div>
  </div>
</div>
