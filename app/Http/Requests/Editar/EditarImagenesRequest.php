<?php

namespace App\Http\Requests\Editar;

use Illuminate\Foundation\Http\FormRequest;

class EditarImagenesRequest extends FormRequest
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
        return [            
            'nuevoImagen' => 'required|image',
            'idProducto' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nuevoImagen.required'       => 'El producto debe tener al menos una (1) imagen',            
            'image'        => 'El campo debe ser una imagen',                    

        ];
    }
    public function attributes()
    {
        return [            
            'nuevoImagen' => 'imagen',
        ];
    }
}
