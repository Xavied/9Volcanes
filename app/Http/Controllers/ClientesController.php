<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = Clientes::latest()->get();

        return view('clientesAdmin.index', compact('clientes'));
    }

    public function store(Request $request)
    {
        $cliente = new Clientes;
        $cliente->nombre = $request->nuevoNombre;
        $cliente->ruc = $request->nuevoRuc;
        $cliente->direccion = $request->nuevoDireccion;
        $cliente->telefono = $request->nuevoTelefono;
        $cliente->correo = $request->nuevoCorreo;
        
        if(isset($request->nuevoSuscrito))
        {
            $cliente->suscrito = $request->nuevoSuscrito;
        }
        else
        {
            $cliente->suscrito = 0;
        }   
        
        dd($cliente);

        $cliente->save();

        return response()->json(['success' => 'Cliente Agregado']);
    }

    public function getClientebyID ($id)
    {
        $cliente = Clientes::where('id', $id)->first(['id', 'nombre', 'ruc', 'telefono', 'correo', 'suscrito']);

        return $cliente->toJson();
    }

    public function update(Request $request)
    {
        $cliente = Clientes::find($request->idEditarCliente);
        $cliente->nombre = $request->editarNombre;
        $cliente->ruc = $request->editarRuc;
        $cliente->direccion = $request->editarDireccion;
        $cliente->telefono = $request->editarTelefono;
        $cliente->correo = $request->editarCorreo;
        
        if(isset($request->editarSuscrito))
        {
            $cliente->suscrito = $request->editarSuscrito;
        }
        else
        {
            $cliente->suscrito = 0;
        }
        
        
        $cliente->save();

        return response()->json(['success' => 'Cliente Modificado']);
    }

    public function destroy(Request $request)
    {        
        $cliente = Clientes::destroy($request->idEliminarCliente);
        
        return response()->json(['success' => 'Cliente Eliminado']);
    }
}
