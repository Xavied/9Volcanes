<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Correos;
use Illuminate\Support\Str;
use App\Traits\UploadTrait;
use Illuminate\Validation\Rules\Unique;

class NewsletterController extends Controller
{
    use UploadTrait;

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
    public function newsprev(Request $request)
    {
        
        $Titulo = $request->titulo;
        $cuerpo = $request->mensaje;
     
        $validar=$request->validate([
            "titulo"=>['required', 'max:150'],
            "mensaje"=>['required', 'max:150'],
            "imagen"=>['required', 'image', 'mimes:jpg,png,jpeg,gif,svg']
        ],
        [
            'required'=> 'El campo ":attribute" es requerido',
            'max'=> 'El tamaño del ":attribute" es muy grande',
            'image'=>'Utiliza un archivo que sea admitido.',
            'mimes'=> ' La imagen deberia ser un archivo tipo: jpg, png, jpeg, gif, svg.'
        ]);

        
        if($validar==true)
        {
            $arrpathimagen=null;
            for ($i=0; $i <= count($request->file())-1 ; $i++) { 
                if ($request->has('imagen_' . $i)) {
                    // Get image file
                    $image = $request->file('imagen_' . $i);
                    // Make a image name based on user name and current timestamp
                    $name = Str::slug($request->input('titulo')).'_'.$i.'_'.time();
                    // Define folder path
                    $folder = 'storage/newsletters/';
                    $direction = 'newsletters/';
                    // Make a file path where image will be stored [ folder path + file name + file extension]
                    $filePath = $direction . $name. '.' . $image->getClientOriginalExtension();
                    // Upload image
                    $this->uploadOne($image, $folder, 'public', $name);
                    $arrpathimagen[$i]= $filePath;
                }
            }
            $mensaje=$this->envio($Titulo, $cuerpo,$arrpathimagen );
            if($mensaje=='Todavía no hay susbcriptores :(')
        {
            return response()->json(['info' => $mensaje],202);
        }
        else
            return  response()->json(['success' => $mensaje],200);
        
        }        

    }
    public function envio($Titulo, $cuerpo, $pathimagen)
    {  
        //pathimagen: "newsletters/nombre.jpg

        //imiciamos el array de los correos
        $arraycorreos=null;
        //iniciamos un contador para guardar los correos
        $i=0;  
        $correos = DB::table('correos')->select('correo')->get();
        $correos=\json_decode($correos, true);
        
        if($correos!=null) //si el correo es distinto de null
        {
            
                foreach ($correos as $correo) //extraemos solo la direccion del correo
                {

                    $arraycorreos[$i]=$correo['correo']; //guardamos todos los correos en un array unico
                    $i++; //aumenta el contador

                }     
            $subject = $Titulo; // ASUNTO DEL CORREO ELECTRONICO
            $for = $arraycorreos; // destinatarios (el array de correos)
            //se envia la vista "news" de la carpeta NEWSLE
                //se envian las variables del titulo, pathimagen y cuerpo a la vista news
            Mail::send(("NewsLe/news"),['ttlo'=>$Titulo,'imgs'=>$pathimagen, 'crp'=>$cuerpo], function($mensaje) use($subject,$for, $pathimagen){
                $mensaje->from("nanosoft101aa@gmail.com"); //desde donde se envia.
                $mensaje->subject($subject);
                $mensaje->to($for);
                //imagenes adjuntas
                foreach($pathimagen as $pathimg)
                {
                    $mensaje->attach("storage/$pathimg");
                }
                
            });
            return 'Enviado Correctamente';
        }
        else
        {
            return 'Todavía no hay susbcriptores :(';
        }


    }
}