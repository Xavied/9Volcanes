<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Imagenes;
use App\Models\Marca;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;

class ProductoController extends Controller
{
    use UploadTrait;

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

    //CRUD admin

    public function index()
    {
        $productosindex = Producto::latest()->get();
        $categorias = Categoria::all(['id', 'nombre']);
        $marcas = Marca::all(['id', 'nombre']);

        return view('productos.indexadmin', compact('productosindex', 'categorias', 'marcas'));
    }

    public function store(Request $request)
    {
        //dd(count($request->file()));
        $producto = new Producto;
        $producto->nombre = $request->nuevoNombre;
        $producto->slug = $request->nuevoNombre;
        $producto->descripcion = $request->nuevoDescripcion;
        $producto->precio = $request->nuevoPrecio;
        $producto->cantidad = $request->nuevoCantidad;
        
        if(isset($request->nuevoVisible))
        {
            $producto->visible = $request->nuevoVisible;
        }
        else
        {
            $producto->visible = 0;
        }
        
        $producto->categoria_id = $request->nuevoCategoria_id;
        $producto->marca_id = $request->nuevoMarca_id;
        //$producto->Imagenes = 
        
        

        $producto->save();

        for ($i=0; $i <= count($request->file())-1 ; $i++) { 
            if ($request->has('imagen_' . $i)) {
                // Get image file
                $image = $request->file('imagen_' . $i);
                // Make a image name based on user name and current timestamp
                $name = Str::slug($request->input('nuevoNombre')).'_'.time();
                // Define folder path
                $folder = 'productos/';
                // Make a file path where image will be stored [ folder path + file name + file extension]
                $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
                // Upload image
                $this->uploadOne($image, $folder, 'public', $name);
                // Set user profile image path in database to filePath
                $imagen = new Imagenes();
                $imagen->url = $filePath;
                $imagen->imageable_id = $producto->id;
                $imagen->imageable_type = 'App\Models\Producto';
                $imagen->save();
            }
        }



        return response()->json(['success' => 'Producto Agregado']);
    }

    public function update(Request $request)
    {
        $producto = Producto::find($request->idEditarProducto);
        $producto->nombre = $request->editarNombre;
        $producto->slug = $request->editarSlug;
        $producto->descripcion = $request->editarDescripcion;
        $producto->precio = $request->editarPrecio;
        $producto->cantidad = $request->editarCantidad;
        $producto->visible = $request->editarVisible;
        $producto->save();

        return response()->json(['success' => 'Producto Editado']);
    }

    public function destroy(Request $request)
    {
        $producto = Producto::find($request->idEliminarProducto);
        Imagenes::destroy($producto->Imagenes()->get('id')->toArray());
        $producto = Producto::destroy($request->idEliminarProducto);
        
        return response()->json(['success' => 'Producto Eliminado']);
    }

    
}

