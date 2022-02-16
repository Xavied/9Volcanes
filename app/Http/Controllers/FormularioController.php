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

    function send(CrearFormularioEmprendedoresRequest $request)
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
                // Definir la ubicación de la carpeta
                $folder = 'storage/formularioTemp/';
                $direction = 'formularioTemp/';
                // Crea la ubicación donde se guardará el archivo [ folder path + file name + file extension]
                $filePath = $direction . $name. '.' . $image->getClientOriginalExtension();
                // Sube el archivo
                $this->uploadOne($image, $folder, 'public', $name);                
                $filepaths[] = $filePath;

                $temporal++;
            } while ($image != null);
            
        }

        //Guarda la información del emprendedor
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
            'numeroProductos' => intval($request->numeroProductos),            
        
        );

        //Guarda la información de cada producto
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

        //Envía el correo
        $mailer = new FormularioMail($data, $filepaths);
        Mail::to('salop72@hotmail.com')->send($mailer);
        //Muestra el mensaje cuando se envía correctamente
        return response()->json(['success' => '¡Se envió el formulario correctamente!']);


    }
}
