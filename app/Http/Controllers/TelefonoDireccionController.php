<?php

namespace App\Http\Controllers;

use App\Models\numeroTelefono;
use Illuminate\Http\Request;

class TelefonoDireccionController extends Controller
{
    public function index(){
      $telefono = numeroTelefono::get()->first();
      return view('Admin.telefono_direccion.index');
    }
    
}
