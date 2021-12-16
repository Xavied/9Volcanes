<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;
use App\Models\Producto;

class EmprendimientoController extends Controller
{
    //Función que retorna todos los elementos de la entidad marca
    public function index(Request $request){

        $buscar = $request->get('buscar_emprendimiento');

        if($buscar==""){            
            $emprendimientos = Marca::select('*')->get();
        }
        else{
            $emprendimientos = Marca::select('*')->where('nombre', 'LIKE', '%'.$buscar.'%')->get();
        }

        return view('emprendimiento.index', compact('emprendimientos'));
    }

    public function unemprend(Marca $marcae){

        $productos = Producto::select('*')->where('marca_id','=',$marcae['id'])->with('Imagenes')->latest()->paginate();

        //dd($productos);

        return view('emprendimiento.emprendimientov',compact('marcae', 'productos'));
    }

}
