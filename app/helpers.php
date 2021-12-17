<?php

use App\Models\Producto;
use Gloudemans\Shoppingcart\Facades\Cart;

function cantidad($producto_id){
    $producto = Producto::findOrFail($producto_id);
    
    $cantidad = $producto -> cantidad;
    
    return $cantidad;
}

function cantidad_agregada($producto_id){
    
    $cart = Cart::content();
    
    $item = $cart->where('id',$producto_id)->first();

    if($item){
        return $item->qty;
    }else{
        return 0;
    }
}

function cantidad_disponible($producto_id){
    return cantidad($producto_id)-cantidad_agregada($producto_id);
}

/* Reduce la cantidad del producto en la base de datos una vez se genera la orden */
function reducirCantidad($elemento)
{
  $producto = Producto::findOrFail($elemento->id);
  $existencias_disponibles = cantidad_disponible($elemento->id);

  $producto->cantidad = $existencias_disponibles;
  $producto->save();
}
function aumentarCantidad($elemento)
{
  $producto = Producto::findOrFail($elemento->id);
  $existencias = cantidad($producto->id) + $elemento->qty;

  $producto->cantidad = $existencias;
  $producto->save();
}