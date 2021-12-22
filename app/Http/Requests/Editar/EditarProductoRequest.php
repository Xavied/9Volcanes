<?php

namespace App\Http\Requests\Editar;

use Illuminate\Foundation\Http\FormRequest;

class EditarProductoRequest extends FormRequest
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
            'idEditarProducto' => 'required',
            'editarNombre' => 'required|unique:productos,nombre,'.$this->idEditarProducto.',id',
            'editarDescripcion' => 'required',
            'editarPrecio' => 'required|numeric|gte:0',
            'editarCantidad' => 'required|numeric|integer|gte:0',
            'editarVisible' => 'nullable',
            'editarCategoria_id' => 'required',
            'editarMarca_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'editarImagen.required'       => 'El producto debe tener al menos una (1) imagen',
            'required'       => 'El campo :attribute es obligatorio',
            'max'            => 'El campo :attribute debe tener máximo :max caracteres',
            'unique'         => 'El campo :attribute ya existe',
            'editarNombre.unique'         => 'Este :attribute ya existe en los registros',
            'integer'        => 'El campo :attribute debe ser un número entero',
            'image'        => 'El campo debe ser una imagen',
            'numeric'        => 'El campo :attribute debe ser un número',
            'gte'        => 'El campo :attribute debe ser mayor o igual a :value',                      

        ];
    }
    public function attributes()
    {
        return [
            'editarNombre' => 'nombre',
            'editarDescripcion' => 'descripción',
            'editarPrecio' => 'precio',
            'editarCantidad' => 'cantidad',
            'editarVisible' => 'visibilidad',
            'editarCategoria_id' => 'categoría',
            'editarMarca_id' => 'emprendimiento',
        ];
    }
}
