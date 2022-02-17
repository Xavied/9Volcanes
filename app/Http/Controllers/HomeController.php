<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Imagenes;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use App\Models\Orden;
use App\Models\Config;

class HomeController extends Controller
{
    public function index()
    {
        $productos = Producto::with('categoria', 'marca', 'Imagenes')->get(); //Obtenemos los productos 
        //$promociones = Producto::with('categoria', 'marca', 'Imagenes')->where('precio','<',5)->get();// Sleccionamos los productos con precios menores
        $promoscrl = Producto::orderBy('id', 'DESC')->with('categoria', 'marca', 'Imagenes')->take(3)->get();
        $promociones = Orden::orderBy('id', 'DESC')->take(6)->get();//Obtenemos las ultimas 6 ordenes y escogemos el mayor de los productos solicitados
        //dd($promociones);

        $infoproducts = [];
        $infoid = [];
        $idTmp = 0;
        //dd($promociones);
        foreach ($promociones as $promos) {
            $id = 0;
            $cantant = 0;

            //$info = Arr::add($infopromo, (string)$promos->id, $promos->contenido);
            $rooms = json_decode($promos->contenido, true);
            foreach ($rooms as $name => $data) {
                $cantnueva = $data['qty'];
                if ($cantnueva > $cantant) {
                    $id =$data['id'];
                    $cantant = $cantnueva;
                }
                //dd($name, $data['id'], $data['qty']); 

            }
            $infoid = Arr::add($infoid, (string)$id, $id);
            $promos = Producto::with('categoria', 'marca', 'Imagenes')->where('id', '=', $id)->get();
            //dd($promos);
            $infoproducts = collect(Arr::add($infoproducts, (string)$id,  $promos));//Una lista con los productos mas solicitados
        }
        //dd($infoid);


        ///***Opcion de Carrusel */
        $info = [];
        $idTmp = 0;
        foreach ($promoscrl as $promocrl) {

            $info = Arr::add($info, 'id' . (string)$idTmp, $promocrl->id);
            $idTmp += 1;
        }

        return view('home', compact('productos', 'infoproducts', 'promoscrl', 'info'));
    }
}
