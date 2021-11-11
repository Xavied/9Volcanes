<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Imagenes;
use App\Http\Controllers\ProductoController;

class HomeController extends Controller{
    public function index(){
        $productos = Producto::with('categoria', 'marca', 'Imagenes')->get();//Obtenemos los productos 
        $promociones = Producto::with('categoria', 'marca', 'Imagenes')->where('precio','<',10)->get();// Sleccionamos los productos con precios menores
        $promos = Producto::with('categoria', 'marca', 'Imagenes')->where('id','<',5)->get();

        return view('home', compact('productos','promociones','promos'));
    }
}