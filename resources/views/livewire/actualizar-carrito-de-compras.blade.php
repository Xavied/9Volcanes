<div class="d-flex align-items-center">
    <button class="btn btn-success {{ $qty == 1 ? 'disabled' :'' }}" wire:click="disminuir()">-</button>
        <span class="mx-1">{{ $qty }}</span>
    <button class="btn btn-success {{ $qty >= $quantity ? 'disabled' :'' }}" wire:click="aumentar()">+</button>
</div>
