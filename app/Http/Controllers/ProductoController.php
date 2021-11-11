<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function productos(Request $request)
    {     
        $buscar = $request->get('buscar_producto');   
        $total_prod = Producto::all()->count();
        return view('productos', [
            //'productos' => Producto::with('categoria', 'marca', 'Imagenes')->latest()->paginate(),
            'productos' => Producto::buscarpor($buscar)->with('Imagenes')->latest()->paginate(),
            'categorias' => Categoria::all(),
            'total' => $total_prod,
        ]);

    }

    public function producto(Producto $productoe)
    {
        return view('producto', ['producto' => $productoe]);
    }

    public function categoria(Categoria $categoria)
    {
        $total_prod = Producto::all()->count();
        return view('categoria', [
            'categoria' => $categoria,
            'categoriastodas' => Categoria::all(),
            'total' => $total_prod,
        ]);
    }

    
}

