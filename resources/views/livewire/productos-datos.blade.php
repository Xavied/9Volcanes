<div class="col-md-6 col-sm-12">
  <div class="card mb-4">
      <div class="card-body">
          <h2 class="card-title">{{ $producto->nombre }}</h2>
          <hr>
          <div class="row">
              <div class="col-auto">
                  <small>Precio:</small>
              </div>
              <div class="col-auto">
                  <p class="lead card-text text-danger"><strong>${{ $producto->precio }}</strong></p>                            
              </div>                        
          </div>
          <div class="row">
              <div class="col-auto">
                  <small>Estado:</small>
              </div>
              @if ($quantity > 0)
                  <div class="col-auto">
                      <p class="lead card-text text-success"><strong>Disponible</strong></p>                      
                  </div>
                  <div class="col-auto">
                      <small class="text-secondary">*Quedan {{$quantity}} unidades</small>                         
                  </div>
              @else
                  <div class="col-auto">
                      <p class="lead card-text text-danger"><strong>No disponible</strong></p>                      
                  </div>
              @endif                      
          </div>
          <hr>
          <div class="row">
              <div class="col-auto ">
                  <small>Marca:</small>
              </div>
              <div class="col-auto ">
                  <p class="card-text">{{ $producto->marca->nombre }}</p>                            
              </div>                        
          </div>
          <div class="row">
              <div class="col-auto">
                  <small>Categoría:</small>
              </div>
              <div class="col-auto">
                  <p class="card-text">{{ $producto->categoria->nombre }}</p>                            
              </div>                        
          </div>
          <hr>
          <div class="row">
              <div class="col-auto">
                  <small>Descripción del producto:</small>
              </div>
              <div class="col-auto">
                  <p class="card-text">{{ $producto->descripcion }}</p>
              </div>
          </div> 
          <div class="d-flex justify-content-between pt-3">
              <div>
                <button class="btn btn-success {{ $qty == 1 ? 'disabled' :'' }}" wire:click="disminuir()">-</button>
                <span>{{ $qty }}</span>
                <button class="btn btn-success {{ $qty >= $quantity ? 'disabled' :'' }}" wire:click="aumentar()">+</button>
              </div>  
              @if ($quantity == 0)
                <button class="btn btn-success disabled" >Agregar al carrito</button>  
              @else
                <button class="btn btn-success" wire:click="agregarItem()">Agregar al carrito</button>  
              @endif
          </div>                 
      </div>
  </div>             
</div>