<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClienteRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Permite la autorización para todos los usuarios
    }

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:mnt_clientes,email',
            'direccion_envio' => 'required|string|max:255',
            'direccion_facturacion' => 'required|string|max:255',
            'telefono' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'apellido.required' => 'El apellido es obligatorio.',
            'email.required' => 'El email es obligatorio.',
            'direccion_envio.required' => 'La dirección de envío es obligatoria.',
            'direccion_facturacion.required' => 'La dirección de facturación es obligatoria.',
            'telefono.required' => 'El teléfono es obligatorio.',
        ];
    }
}
