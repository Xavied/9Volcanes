<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function show(){
        return view('compras.carrito-de-compras');
    }
}
