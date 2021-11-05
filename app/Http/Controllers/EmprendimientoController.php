<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;

class EmprendimientoController extends Controller
{
    public function index(){
        $emprendimientos = Marca::select('*')->get();

        return view('emprendimiento.index', compact('emprendimientos'));
    }
}
