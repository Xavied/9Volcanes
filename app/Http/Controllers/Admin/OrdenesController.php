<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orden;
use Illuminate\Http\Request;


class OrdenesController extends Controller
{
    public function index(){
        $ordenes = Orden::query()->where('estado','<>',0);
        
        if (request('estado')) {
            $ordenes->where('estado', request('estado'));
        }
        
        $ordenes = $ordenes->get();
        
        $pendiente = Orden::where('estado', 1)->count();
        $pagado = Orden::where('estado', 2)->count();
        $enviado = Orden::where('estado', 3)->count();
        $entregado = Orden::where('estado', 4)->count();
        $anulado = Orden::where('estado', 5)->count();
        
        return view('admin.ordenes.index',
        compact([
            'pendiente',
            'ordenes',
            'pagado',
            'enviado',
            'entregado',
            'anulado',
        ]));
    }
    public function show(Orden $orden)
    {
        $productos = json_decode($orden->contenido);
        return view('admin.ordenes.show',compact(['orden','productos']));
    }
}
