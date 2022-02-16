<div>  
  <div class="flex justify-between ml-8 my-4">
    <input
      type="text"
      placeholder="Buscar Usuarios"
      wire:model="busqueda"
    />
    <a
      href="{{ route('admin.usuarios.create') }}"
      class="btn btn-primary"
      >Agregar usuario</a
    >
  </div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Nombre</th>
        <th scope="col">Emial</th>
        <th scope="col">Rol</th>
        <th scope="col">Editar | Eliminar</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($usuarios as $usuario)
        <tr>
          <th scope="row">{{ $usuario->id }}</th>
          <td>{{ $usuario->name }}</td>
          <td>{{ $usuario->email }}</td>
          <td>
            @if($usuario->hasRole('Administrador'))
                Administrador
            @else
                Cliente
            @endif
          </td>
          <td>
            <a href="{{ route('admin.usuarios.edit',$usuario) }}" class="btn btn-warning">Editar</a>
            <button wire:click="destroy({{ $usuario->id }})" class="btn btn-danger">Eliminar</button>
          </td>
        </tr>
    </tbody>
    @endforeach
  </table>
  @if ($modalEliminar) @include('livewire.admin.eliminar-form')
  @endif
</div>

