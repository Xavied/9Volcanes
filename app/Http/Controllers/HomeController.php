<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Imagenes;

class HomeController extends Controller{
    public function index(){
        $productos = Producto::select('*')->get();
        $imagenes = Imagenes::select('*')->get();

        return view('home', compact('productos','imagenes'));
    }
}