<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Marca;

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

    //CRUD EMPRENDIMIENTOS
    public function show(Request $request)//vista para crear un nuevo emprendimiento
    {

        
        $buscar = $request->get('buscar_emprendimiento');

        if($buscar==""){            
            $emprendimientos = Marca::select('*')->get();
        }
        else{
            $emprendimientos = Marca::select('*')->where('nombre', 'LIKE', '%'.$buscar.'%')->get();
        }
        return view('EmprendimientosAdmin.indexemprendimiento', compact('emprendimientos'));
    

    }
    public function storage(Request $request)//guardamos al nuevo emprendimiento
    {
        
        //convertimos el nombre del emprendimiento en una ***URL AMIGABLE***
        $slug = Str::slug($request->nuevoNombre, '-');        
        //arreglamos los datos que se van a guardar
        $datos=['nombre'=>$request->nuevoNombre, 
        'slug'=>$slug,
        'descripcion'=>$request->nuevoDescripcion];
        //guardamos todo en la base de datos 
        Marca::insert($datos);
       // return redirect('emprends');
        return response()->json(['success' => 'Emprendimiento Agregado']);

    }

    function update(Request $request)//editamos un emprenidmiento
    {
        $marca = Marca::find($request->idEditarEmprendimiento);
        $marca->nombre = $request->editarNombre;
        $marca->slug = Str::slug($request->editarNombre, '-');
        $marca->descripcion = $request->editarDescripcion;
        $marca->save();

        return response()->json(['success' => 'Emprendimiento Editado']);

    }
    public function getEmprendimientobyID($id)
    {
        $marca = Marca::where('id', $id)->first(['id', 'nombre', 'descripcion']);

        return $marca->toJson();
    }

    public function destroy(Request $request)
    {
    
        Marca::destroy($request->idEliminarEmprendimiento);
        //redireccionamos a la pagina principal de emprendimientos.
        //return back();
        return response()->json(['success' => 'Producto Eliminado']);
    }

}
