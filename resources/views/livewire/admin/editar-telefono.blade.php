<div class="">
  <div class="pt-3 pb-3">
    <label for="exampleInputEmail1" class="form-label">Número de teléfono</label>
    <div class="grid grid-cols-4 gap-6">
      <input type="number" class="col-span-3 form-control" wire:model="numero_de_telefono">
      <button class="btn btn-success" wire:click="actualizar()">Actualizar número de teléfono</button>
    </div>
    <div id="emailHelp" class="form-text">Por favor poner el número de teléfono con el codigo del pais.</div>
  </div>
</div>
