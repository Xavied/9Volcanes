<div>
  <div class="pt-3 pb-3">
    <p class="text-center text-2xl">Coordenadas de la tienda</p>
    <label for="exampleInputEmail1" class="form-label">Longitud</label>
    <div class="grid grid-cols-4 gap-6">
      <input type="text" class="col-span-3 form-control" wire:model="longitud">
    </div>
    <div id="emailHelp" class="form-text"></div>
    <label for="exampleInputEmail1" class="form-label">Latitud</label>
    <div class="grid grid-cols-4 gap-6">
      <input type="text" class="col-span-3 form-control" wire:model="latitud">
      <button class="btn btn-danger" wire:click="actualizar()">Actualizar coordenadas</button>
    </div>
    <div id="emailHelp" class="form-text">Por favor colocar la coordenadas con puntos</div>
  </div>
</div>
