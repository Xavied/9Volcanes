<div>
  <div
  class="
    bg-black bg-opacity-50
    fixed
    inset-0
    min-w-0
    h-screen
    flex
    justify-center
    items-center
  "
>
    <div
      class="
        bg-white
        max-w-lg
        rounded-lg
      "
    >
      <div class="my-3 mx-5 flex justify-center">
        <p class="text-3xl text-gray-600 font-semibold mb-2">¿Está seguro de que desea eliminar este usuario?</p>
      </div>
      <div class="bg-white flex justify-center">
        <label for="" class="inputLabelStyle mx-10"
          >Si eliminas un usuario tambien se eliminaran las ordenes asociadas a
          este.
        </label>
      </div>
      <div class="flex justify-around pt-2 pb-3">
        <button class="btn btn-primary" wire:click="destroyConfirmed()">
          Si, eliminar usuario
        </button>
        <button
          class="btn btn-danger"
          wire:click="cerrarModalEliminar()"
        >
          No, cancelar
        </button>
      </div>
    </div>
  </div>
</div>
