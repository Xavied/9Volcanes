<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Clientes; //Cambiar por correos *solo utilizamos para la prueba de extracci'on de correos
use App\Models\Correos;
use Illuminate\Validation\Rules\Unique;

class NewsletterController extends Controller
{

    public function suscribir(Request $request)
    {
        $validar=$request->validate([
            "correo"=>['required','unique:correos,correo'],//unique en la tabla correos en el campo correo
        ],
        [
            'required'=> ':attribute es requerido',
            'unique'=> 'Este :attribute: ['. "$request->correo" .'] ya está suscrito a nuestras promociones '
        ]);

        if($validar==true)
        {
            $datos=$request->except('_token');
            Correos::insert($datos);

        }        
        return back()->with('mensaje', 'Gracias por suscribirte');

    }
    public function index()
    {
        return \view('NewsLe/indexnews');


    }
    public function envio(Request $request)
    {  
        //imiciamos el array de los correos
        $arraycorreos=null;
        //iniciamos un contador para guardar los correos
        $i=0;  
        $correos =  Correos::select('correo')->get();//extraemos los correos suscritos

        if($correos!=null) //si el correo es distinto de null
        {
                foreach ($correos as $correo) //extraemos solo la direccion del correo
                {

                    $arraycorreos[$i]=$correo->correo; //guardamos todos los correos en un array unico
                    $i++; //aumenta el contador

                }
            
            
            $subject = "Probando el newsletter"; // Titulo del mensaje
            $for = $arraycorreos; // destinatarios (el array de correos)
            //se envia la vista "news" de la carpeta NEWSLE
            Mail::send(("NewsLe/news"),$request->all(), function($mensaje) use($subject,$for){
                $mensaje->from("nanosoft101aa@gmail.com"); //desde donde se envia.
                $mensaje->subject($subject);
                $mensaje->to($for);
            });
        }
        return redirect()->back();
    }
}
