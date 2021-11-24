<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Clientes; //Cambiar por correos *solo utilizamos para la prueba de extracci'on de correos

class NewsletterController extends Controller
{
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
        $correos =  Clientes::select('correo')->where('subscrito',true)->get();//extraemos los correos
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
