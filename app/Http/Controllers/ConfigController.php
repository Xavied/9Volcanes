<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    //
    public function index()
    {
        $footerC1 = Config::where('id', '=', 1)->get();   
        foreach ($footerC1 as $foot) {
            $titleC1 = $foot->titulo;
        }
    
        $footerC2 = Config::where('id', '=', 2)->get();
        foreach ($footerC2 as $foot) {
            $titleC2 = $foot->titulo;
        }

        return view('footerAdmin.index',compact('titleC1','titleC2'));
    }
    public function update(Request $request)
    {

        $id = $request->id;
        $Titulo = $request->titulo;
        $cuerpo = $request->cuerpo;

        $validar = $request->validate(
            [
                "titulo" => ['required', 'max:15'],
                "cuerpo" => ['required', 'max:200'],
            ],
            [
                'required' => 'El campo ":attribute" es requerido',
                'max' => 'El tamaño del ":attribute" es muy grande',
            ]
        );
        if ($validar == true) {
            $configFoot = Config::find($id);
            $configFoot->titulo = $Titulo;
            $configFoot->cuerpo = $cuerpo;
            $configFoot->save();
            return response()->json(['success' => 'Columna Editada']);
        }
    }
}
