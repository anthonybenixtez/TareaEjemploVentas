<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClienteRequest;
use App\Models\MntCliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Crear un cliente asociado al usuario logueado
            $cliente = MntCliente::create([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'email' => $request->email,
                'user_id' => Auth::id(), // Asociamos al usuario logueado
                'direccion_envio' => $request->direccion_envio,
                'direccion_facturacion' => $request->direccion_facturacion,
                'telefono' => $request->telefono,
            ]);

            return response()->json([
                'message' => 'Cliente creado con éxito',
                'data' => $cliente
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al crear el cliente',
                'error' => $e->getMessage()
            ], 422);
        }
    }

    public function show($id)
    {
        // Buscar cliente por ID
        $cliente = MntCliente::find($id);

        if (!$cliente) {
            return response()->json([
                'message' => 'Cliente no encontrado'
            ], 404);
        }

        return response()->json([
            'message' => 'Cliente encontrado',
            'data' => $cliente
        ], 200);
    }
}
