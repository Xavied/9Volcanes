<?php

namespace App\Http\Controllers;

use App\Http\Requests\Crear\CrearProductoRequest;
use App\Http\Requests\Editar\EditarImagenesRequest;
use App\Http\Requests\Editar\EditarProductoRequest;
use App\Models\Categoria;
use App\Models\Imagenes;
use App\Models\Marca;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\Environment\Console;

class ProductoController extends Controller
{
    use UploadTrait;

    public function productos(Request $request)
    {     
        $buscar = $request->get('buscar_producto');   
        $total_prod = Producto::all()->where('visible', True)->count();
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
        $total_prod = Producto::all()->where('visible', True)->count();
        return view('categoria', [
            'categoria' => $categoria,
            'categoriastodas' => Categoria::all(),
            'total' => $total_prod,
        ]);
    }

    //CRUD admin

    public function index(Request $request)
    {
        $buscar = $request->get('buscar_producto');

        if($buscar==""){            
            $productosindex = Producto::select('*')->get();
        }
        else{
            $productosindex = Producto::select('*')->where('nombre', 'LIKE', '%'.$buscar.'%')->get();
        }

        //$productosindex = Producto::latest()->get();
        $categorias = Categoria::all(['id', 'nombre']);
        $marcas = Marca::all(['id', 'nombre']);

        return view('adminProductos.indexadmin', compact('productosindex', 'categorias', 'marcas',));
    }

    public function store(CrearProductoRequest $request)
    {
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
        

        $producto->save();

        
        for ($i=0; $i <= count($request->file())-1 ; $i++) { 
            if ($request->has('imagen_' . $i)) {
                // Get image file
                $image = $request->file('imagen_' . $i);
                // Make a image name based on user name and current timestamp
                $name = Str::slug($request->input('nuevoNombre')).'_'.$i.'_'.time();
                // Define folder path
                $folder = 'storage/productos/';
                $direction = 'productos/';
                // Make a file path where image will be stored [ folder path + file name + file extension]
                $filePath = $direction . $name. '.' . $image->getClientOriginalExtension();
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

    public function getProductbyID ($id)
    {
        $producto = Producto::where('id', $id)->first(['id', 'nombre', 'descripcion', 'precio', 'cantidad', 'visible', 'categoria_id', 'marca_id']);

        return $producto->toJson();
    }

    public function update(EditarProductoRequest $request)
    {
        $producto = Producto::find($request->idEditarProducto);
        $producto->nombre = $request->editarNombre;
        $producto->slug = $request->editarNombre;
        $producto->descripcion = $request->editarDescripcion;
        $producto->precio = $request->editarPrecio;
        $producto->cantidad = $request->editarCantidad;
        if(isset($request->editarVisible))
        {
            $producto->visible = $request->editarVisible;
        }
        else
        {
            $producto->visible = 0;
        }
        
        $producto->categoria_id = $request->editarCategoria_id;
        $producto->marca_id = $request->editarMarca_id;
        $producto->save();

        return response()->json(['success' => 'Producto Editado']);
    }

    public function destroy(Request $request)
    {
        $producto = Producto::find($request->idEliminarProducto);
        $imageArray = $producto->Imagenes()->pluck('url')->toArray();
        foreach ($imageArray as $image) {
            $image_path = public_path().'/storage/'.$image;
            unlink($image_path);            
        }
        Imagenes::destroy($producto->Imagenes()->get('id')->toArray());
        $producto = Producto::destroy($request->idEliminarProducto);
        
        return response()->json(['success' => 'Producto Eliminado']);
    }  

    public function editarImagenes(Producto $producto)
    {
        $producto->load('Imagenes');
        return view('adminProductos.editarImagenes', ['producto' => $producto]);
    }

    public function eliminarImagen(Request $request)
    {
        $imagen = Imagenes::find($request->idEliminarImagen);
        $image_path = public_path().'/storage/'.$imagen->url;
        unlink($image_path); 
        $imagen->delete();          
        
        return response()->json(['success' => 'Imagen Eliminada']);
    }

    public function agregarImagenes(EditarImagenesRequest $request)
    {    
        $producto = Producto::find($request->idProducto);
        

        for ($i=0; $i <= count($request->file())-1 ; $i++) { 
            if ($request->has('imagen_' . $i)) {
                // Get image file
                $image = $request->file('imagen_' . $i);
                // Make a image name based on user name and current timestamp
                $name = Str::slug($producto->nombre).'_'.$i.'_'.time();
                // Define folder path
                $folder = 'storage/productos/';
                $direction = 'productos/';
                // Make a file path where image will be stored [ folder path + file name + file extension]
                $filePath = $direction . $name. '.' . $image->getClientOriginalExtension();
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

        return response()->json(['success' => 'Imagen(es) Agregada(s)']);
    }
}

