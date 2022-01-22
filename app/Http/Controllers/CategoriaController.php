<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
/**
 * Class CategoriaController
 * @package App\Http\Controllers
 */
class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $buscar = $request->get('buscar_categoria');

        if($buscar==""){            
            $categorias = Categoria::select('*')->paginate();
        }
        else{
            $categorias = Categoria::select('*')->where('nombre', 'LIKE', '%'.$buscar.'%')->paginate();
        }

        return view('categoria.index', compact('categorias'))
            ->with('i', (request()->input('page', 1) - 1) * $categorias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria = new Categoria();
        return view('categoria.create', compact('categoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //VALIDAMOS LOS DATOS QUE LLEGAN
        $validar=$request->validate([
            "nuevoNombre"=>['required','unique:categorias,nombre', 'max:45'],//unique en la tabla marcas en el campo nombre
        ]);
        
        if($validar==true)
        {
            $categoria = new Categoria();
            $categoria->nombre = $request->nuevoNombre;
            $categoria->slug  = Str::slug( $request->nuevoNombre,'-');
            $categoria->save();

            return response()->json(['success' => 'Categoria Agregada']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = Categoria::find($id);

        return view('categoria.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::find($id);

        return view('categoria.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Categoria $categoria
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request)
    {
         //veremos si se esta editando una misma fila en la base de datos
         $categoriaigual = Categoria::find($request->idEditarCategoria);
         //verificaremos lo anterior mediante el nombre de la variable
         $nombreigual=$categoriaigual->nombre;
         //si el nombre del request es igual al nombre de la fila de la BDD encontrada por medio del ID request
         if( $nombreigual  == $request->editarNombre)
         {
            /*$categoria = Categoria::find($request->idEditarCategoria);
            $categoria->nombre = $request->editarNombre;
            $categoria->slug  = Str::slug( $request->editarNombre,'-');
            $categoria->save();*/
            //guardamos todo exactamente igual  
            $categoriaigual->nombre = $request->editarNombre;
            $categoriaigual->slug = Str::slug($request->editarNombre, '-');
            $categoriaigual->save();
            
            return response()->json(['success' => 'Categoria Editada']);
         }

          //si el nombre del request no es igual al nombre de la fila de la BDD encontrada por medio del ID request
        if ($nombreigual  !== $request->editarNombre)
        {
            //validamos el formulario nuevo
            $validar=$request->validate([
                "editarNombre"=>['required','unique:categorias,nombre', 'max:45'],//unique en la tabla marcas en el campo nombre
            ]);
            //guardamos en caso de que el formulario sea valido.
            if($validar==true)
            {
                $categoria = Categoria::find($request->idEditarCategoria);
                $categoria->nombre = $request->editarNombre;
                $categoria->slug  = Str::slug( $request->editarNombre,'-');
                $categoria->save();

                return response()->json(['success' => 'Emprendimiento Editado']);
            }
        }
    }
    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Request $request)
    {
        $categoria = Categoria::find($request->idEliminarCategoria)->delete();
        

        return response()->json(['success' => 'Categoria Eliminada']);
    }
    public function getCategoriabyID ($id)
    {
        $categoria = Categoria::where('id', $id)->first(['id', 'nombre']);

        return $categoria->toJson();
    }

}
