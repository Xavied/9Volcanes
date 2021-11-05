<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function productos()
    {
        return view('productos', [
            'productos' => Producto::with('categoria', 'marca', 'Imagenes')->latest()->paginate(),
            //'productos' => Producto::with('marca')->latest()->paginate(),
            //'productos' => Producto::with('Imagenes')->latest()->paginate()
        ]);

    }

    public function producto(Producto $productoe)
    {
        return view('producto', ['producto' => $productoe]);
    }
}

