<?php

namespace App\Http\Requests\Crear;

use Illuminate\Foundation\Http\FormRequest;

class CrearProductoRequest extends FormRequest
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
            'nuevoNombre' => 'required|unique:productos,nombre',
            'nuevoDescripcion' => 'required',
            'nuevoPrecio' => 'required|numeric|gte:0',
            'nuevoCantidad' => 'required|numeric|integer|gte:0',
            'nuevoVisible' => 'nullable',
            'nuevoCategoria_id' => 'required',
            'nuevoMarca_id' => 'required',
            'nuevoImagen' => 'required|image',
        ];
    }

    public function messages()
    {
        return [
            'nuevoImagen.required'       => 'El producto debe tener al menos una (1) imagen',
            'required'       => 'El campo :attribute es obligatorio',
            'max'            => 'El campo :attribute debe tener máximo :max caracteres',
            'unique'         => 'El campo :attribute ya existe',            
            'nuevoNombre.unique'         => 'Este :attribute ya existe en los registros',
            'integer'        => 'El campo :attribute debe ser un número entero',
            'image'        => 'El campo debe ser una imagen',
            'numeric'        => 'El campo :attribute debe ser un número',
            'gte'        => 'El campo :attribute debe ser mayor o igual a :value',                      

        ];
    }
    public function attributes()
    {
        return [
            'nuevoNombre' => 'nombre',
            'nuevoDescripcion' => 'descripción',
            'nuevoPrecio' => 'precio',
            'nuevoCantidad' => 'cantidad',
            'nuevoVisible' => 'visibilidad',
            'nuevoCategoria_id' => 'categoría',
            'nuevoMarca_id' => 'emprendimiento',
            'nuevoImagen' => 'imagen',
        ];
    }
}
