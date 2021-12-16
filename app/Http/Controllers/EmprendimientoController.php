<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
        $productos = Producto::select('*')->where('marca_id', '=', $marcae['id'])->with('Imagenes')->latest()->paginate();

        //dd($productos);

        return view('emprendimiento.emprendimientov', compact('marcae', 'productos'));
    }
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
        return redirect('emprends');
        //return response()->json(['success' => 'Emprendimiento Agregado']);

    }

    function update(Request $request)//editamos un emprenidmiento
    {
        //verificamos que exista el id
        $marca=Marca::findOrFail($request->idEditarEmprendimiento);
  
        if($marca!=null)
        {
            //definimos el slug
            $slug = Str::slug($request->nuevoNombre, '-');
            //definimos los datos a actualizar
            $datosMarca=['nombre'=>$request->nuevoNombre, 
            'slug'=>$slug,
            'descripcion'=>$request->nuevoDescripcion];

            //guardamos todo en la base segun el id
            Marca::where('id','=',$request->idEditarEmprendimiento)->update($datosMarca);
        }
        return back();

    }
    public function destroy(Request $request)
    {
        //Tomamos el id de la marca
        $id=$request->idEliminarEmprendimiento;
        //destruimos la marca segun el id proporcionado
        Marca::destroy($id);
        //redireccionamos a la pagina principal de emprendimientos.
        return back();
    }

}
