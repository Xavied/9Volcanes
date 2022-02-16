<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-black">
  <h1 class="text-2xl text-center font-medium">Crear nuevo usuario</h1>
  <div class="bg-white p-6">
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
      @error('password_confirmation')
      <span class="text-danger">
        {{ $message }}
      </span>
      @enderror
    </div>
    <div class="grid">
      <label class="form-label" for="">Administrador:</label>
      <label class="switch">
        <input class="form-check-input" type="checkbox" wire:model="is_admin" />
        <span class="slider round"></span>
      </label>
      
      @error('is_admin')
      <span class="text-danger">
        {{ $message }}
      </span>
      @enderror
    </div>
    <div class="grid grid-cols-2 gap-6 my-4">
      <a
        href="{{ route('admin.usuarios') }}"
        class="btn btn-danger"
        >Cancelar</a
      >
      <button
        class="btn btn-success"
        wire:loading.class.remove="btn-purple"
        wire:loading.class="btn-purple-loading"
        wire:loading.attr="disabled"
        wire:click="save"
      >
        Crear usuario
      </button>
    </div>
  </div>
</div>
