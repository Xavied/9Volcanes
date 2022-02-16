<?php

namespace App\Http\Controllers;

use App\Http\Requests\Crear\CrearFormularioEmprendedoresRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FormularioMail;
use Illuminate\Support\Str;
use App\Traits\UploadTrait;

class FormularioController extends Controller
{
    use UploadTrait;
    function index()
    {
     return view('formulario');
    }

    function send(Request $request)
    {
        
        $filepaths = array();
        for ($i=0; $i < $request->numeroProductos; $i++) {
            $temporal = 0;
            do {
                $image = $request->file('producto_'.($i+1) . '_'. $temporal);
                
                if ($image == null) {
                    break;
                }
                $name = Str::slug($request->input('empProducto_' . ($i+1))). '_'. ($i+1).'_'.($temporal+1);
                // Define folder path
                $folder = 'storage/formularioTemp/';
                $direction = 'formularioTemp/';
                // Make a file path where image will be stored [ folder path + file name + file extension]
                $filePath = $direction . $name. '.' . $image->getClientOriginalExtension();
                // Upload image
                $this->uploadOne($image, $folder, 'public', $name);
                // Set user profile image path in database to filePath 
                
                $filepaths[] = $filePath;

                $temporal++;
            } while ($image != null);
            
        }
        //dd($filepaths);
        $data = array(
            'empNombreEmpresa' => $request->empNombreEmpresa,
            'empNumeroRUC' => $request->empNumeroRUC,
            'empUbicacion' => $request->empUbicacion,
            'empDireccion' => $request->empDireccion,
            'empTelefono' => $request->empTelefono,
            'empCorreo' => $request->empCorreo,
            'empRedes' => $request->empRedes,
            'empPropietario' => $request->empPropietario,
            'empContacto' => $request->empContacto,
            'empTelfContacto' => $request->empTelfContacto,            
        
        );

        for ($i=0; $i < $request->get('numeroProductos'); $i++) { 
            $numero=$i+1;
            $data['empProducto_'.$numero] = $request->input('empProducto_' . $numero);  
            $data['empMarca_'.$numero] = $request->input('empMarca_' . $numero); 
            $data['empDescripcion_'.$numero] = $request->input('empDescripcion_' . $numero);  
            $data['empPresentacion_'.$numero] = $request->input('empPresentacion_' . $numero);  
            $data['empEmpaque_'.$numero] = $request->input('empEmpaque_' . $numero);  
            $data['empValorVenta_'.$numero] = $request->input('empValorVenta_' . $numero);
            $data['empCapacidad_'.$numero] = $request->input('empCapacidad_' . $numero);  
            $data['empNotificacion_'.$numero] = $request->input('empNotificacion_' . $numero);  
            $data['empCertificaciones_'.$numero] = $request->input('empCertificaciones_' . $numero);  
        }

        //dd($data, $filepaths);
        //$data = $request->all();

        $mailer = new FormularioMail($data, $filepaths);
        //dd($mailer);
     Mail::to('salop72@hotmail.com')->send($mailer);
     return response()->json(['success' => 'Thanks for contacting us!']);

     //return back()->with('success', 'Thanks for contacting us!');

    }
}
