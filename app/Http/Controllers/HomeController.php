<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Imagenes;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Arr;

class HomeController extends Controller{
    public function index(){
        $productos = Producto::with('categoria', 'marca', 'Imagenes')->get();//Obtenemos los productos 
        $promociones = Producto::with('categoria', 'marca', 'Imagenes')->where('precio','<',5)->get();// Sleccionamos los productos con precios menores
        $promoscrl = Producto::orderBy('id','DESC')->with('categoria', 'marca', 'Imagenes')->take(3)->get();
       
        $info = [];
        $idTmp = 0;
        foreach($promoscrl as $promocrl){

            $info = Arr::add($info, 'id'.(string)$idTmp, $promocrl->id);
            $idTmp +=1;
        }

        return view('home', compact('productos','promociones','promoscrl','info'));
    }
}