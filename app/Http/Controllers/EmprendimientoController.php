<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Marca;
use App\Models\Producto;

class EmprendimientoController extends Controller
{
    //Función que retorna todos los elementos de la entidad marca y buscador
    public function index(Request $request){

        $buscar = $request->get('buscar_emprendimiento');

        if($buscar==""){            
            $emprendimientos = Marca::select('*')->get();
        }
        else{
            $emprendimientos = Marca::select('*')->where('nombre', 'LIKE', '%'.$buscar.'%')->with('Imagenes')->latest()->paginate();
        }

        return view('emprendimiento.index', compact('emprendimientos'));
    }

    //Función retorna todos los producros de acuerdo al emprendimiento
    public function unemprend(Marca $marcae){
        $productos = Producto::select('*')->where('marca_id', '=', $marcae['id'])->with('Imagenes')->latest()->paginate();

        return view('emprendimiento.emprendimientov', compact('marcae', 'productos'));
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
        //VALIDAMOS LOS DATOS QUE LLEGAN
        $validar=$request->validate([
            "nuevoNombre"=>['required','unique:marcas,nombre', 'max:45'],//unique en la tabla marcas en el campo nombre
        ],
        [
            'required'=> ':attribute es requerido',
            'unique'=> 'Este :attribute: ['. "$request->nuevoNombre" .'] ya existe '
        ]);
        if($validar==true)
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
    }

    function update(Request $request)//editamos un emprendimiento
    {
        //veremos si se esta editando una misma fila en la base de datos
        $marcaIgual = Marca::find($request->idEditarEmprendimiento);
        //verificaremos lo anterior mediante el nombre de la variable
        $nombreigual=$marcaIgual->nombre;
        //si el nombre del request es igual al nombre de la fila de la BDD encontrada por medio del ID request
        if( $nombreigual  == $request->editarNombre)
        {
            //guardamos todo exactamente igual
            $marcaIgual->nombre = $request->editarNombre;
            $marcaIgual->slug = Str::slug($request->editarNombre, '-');
            $marcaIgual->descripcion = $request->editarDescripcion;
            $marcaIgual->save();
            return response()->json(['success' => 'Emprendimiento Editado']);
        }
        
        //si el nombre del request no es igual al nombre de la fila de la BDD encontrada por medio del ID request
        if ($nombreigual  !== $request->editarNombre)
        {
            //validamos el formulario nuevo
            $validar=$request->validate([
                "editarNombre"=>['required','unique:marcas,nombre', 'max:45'],//unique en la tabla marcas en el campo nombre
            ]);
            //guardamos en caso de que el formulario sea valido.
            if($validar==true)
            {
                $marca = Marca::find($request->idEditarEmprendimiento);
                $marca->nombre = $request->editarNombre;
                $marca->slug = Str::slug($request->editarNombre, '-');
                $marca->descripcion = $request->editarDescripcion;
                $marca->save();
                return response()->json(['success' => 'Emprendimiento Editado']);
            }
        }

       

        

    }
    //funcion para poblar el modal de UPDATE
    public function getEmprendimientobyID($id)
    {
        $marca = Marca::where('id', $id)->first(['id', 'nombre', 'descripcion']);

        return $marca->toJson();
    }
    //Funcion para borrar emprendimientos
    public function destroy(Request $request)
    {
    
        Marca::destroy($request->idEliminarEmprendimiento);
        //redireccionamos a la pagina principal de emprendimientos.
        //return back();
        return response()->json(['success' => 'Producto Eliminado']);
    }

}
