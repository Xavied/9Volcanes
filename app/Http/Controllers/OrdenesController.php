<?php

namespace App\Http\Controllers;

use App\Models\direccionTienda;
use App\Models\numeroTelefono;
use App\Models\Orden;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class OrdenesController extends Controller
{
    public function index(){
        $ordenes = Orden::query()->where('user_id', auth()->user()->id);
        
        if (request('estado')) {
            $ordenes->where('estado', request('estado'));
        }
        
        $ordenes = $ordenes->get();
        
        $pendiente = Orden::where('estado', 1)
            ->where('user_id', auth()->user()->id)
            ->count();
        $pagado = Orden::where('estado', 2)
            ->where('user_id', auth()->user()->id)
            ->count();
        $enviado = Orden::where('estado', 3)
            ->where('user_id', auth()->user()->id)
            ->count();
        $entregado = Orden::where('estado', 4)
            ->where('user_id', auth()->user()->id)
            ->count();
        $anulado = Orden::where('estado', 5)
            ->where('user_id', auth()->user()->id)
            ->count();
        
        return view('ordenes.index',
        compact([
            'ordenes',
            'pendiente',
            'pagado',
            'enviado',
            'entregado',
            'anulado',
        ]));
    }
    
    public function create(){
        return view('ordenes.crear-orden');
    }
    
    public function show(Orden $orden){
        $direccion = direccionTienda::get()->first();
        $this->authorize('show', $orden);
        
        $productos = json_decode($orden->contenido);
        return view('ordenes.show',compact(['orden','productos','direccion']));
    }
    
    public function pagar(Orden $orden){
      
        $direccion = direccionTienda::get()->first();
        $telefono = numeroTelefono::get()->first();
      
        Alert::toast('Gracias por tu compra', 'Toast Type');
        $this->authorize('show',$orden);
        $this->authorize('pendiente',$orden);
        
        return view('ordenes.pagar-orden',compact(['orden','direccion','telefono']));
    }
}
