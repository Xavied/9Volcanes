<?php

namespace App\Http\Requests\Crear;

use Illuminate\Foundation\Http\FormRequest;

class CrearFormularioEmprendedoresRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [             
            'empNombreEmpresa' => 'required',
            'empNumeroRUC' => 'required|numeric',           
            'empUbicacion' => 'required',
            'empDireccion' => 'required',          
            'empTelefono' => 'required',         
            'empCorreo' => 'required',         
            'empRedes' => 'required',         
            'empPropietario' => 'required',         
            'empContacto' => 'required',         
            'empTelfContacto' => 'required',       
        ];
    
        for ($i=0; $i < $this->request->get('numeroProductos'); $i++) { 
            $numero=$i+1;
            $rules['empProducto_'.$numero] = 'required';
            $rules['empMarca_'.$numero] = 'required';
            $rules['empDescripcion_'.$numero] = 'required';
            $rules['empPresentacion_'.$numero] = 'required';
            $rules['empEmpaque_'.$numero] = 'required';
            $rules['empValorVenta_'.$numero] = 'required|numeric';
            $rules['empCapacidad_'.$numero] = 'required';
            $rules['empNotificacion_'.$numero] = 'required';
            $rules['empCertificaciones_'.$numero] = 'required';            

                   }

        
                    
        return $rules;
    }

    public function messages()
    {
        return [
            // 'empArchivos.required'       => 'El producto debe tener al menos un (1) archivo',
            'empArchivos.max'       => 'El producto debe tener máximo dos (2) imagenes',

            'required'       => 'El campo :attribute es obligatorio',            
            'numeric'        => 'El campo :attribute debe ser un número',     
        ];
    }
    public function attributes()
    {
        $rules = [             
            'empNombreEmpresa' => 'Nombre Empresa',
            'empNumeroRUC' => 'Número RUC',           
            'empUbicacion' => 'Ubicación',
            'empDireccion' => 'Dirección',          
            'empTelefono' => 'Teléfono',         
            'empCorreo' => 'Correo',         
            'empRedes' => 'Redes',         
            'empPropietario' => 'Propietario',         
            'empContacto' => 'Contacto',         
            'empTelfContacto' => 'Teléfono Contacto',       
        ];
    
        for ($i=0; $i < $this->request->get('numeroProductos'); $i++) { 
            $numero=$i+1;
            $rules['empProducto_'.$numero] = 'Producto ' .$numero;
            $rules['empMarca_'.$numero] = 'Marca ' .$numero;
            $rules['empDescripcion_'.$numero] = 'Descripción ' .$numero;
            $rules['empPresentacion_'.$numero] = 'Presentación ' .$numero;
            $rules['empEmpaque_'.$numero] = 'Espaque ' .$numero;
            $rules['empValorVenta_'.$numero] = 'Valor de venta ' .$numero;
            $rules['empCapacidad_'.$numero] = 'Capacidad ' .$numero;
            $rules['empNotificacion_'.$numero] = 'Notificiación ' .$numero;
            $rules['empCertificaciones_'.$numero] = 'Certificaciones ' .$numero;

        }            
        return $rules;
        
    }
}
