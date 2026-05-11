<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Exception;
use App\Models\Cliente;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Cliente::create($request->all());
        return redirect()->route('clientes.index')->with('successMsg', 'El registro se guardó exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $cliente = Cliente::findOrFail($id);
            $cliente->delete();
            return redirect()->route('clientes.index')->with('successMsg', 'El cliente se eliminó exitosamente');
        } catch (QueryException $e) {
            Log::error('Error al eliminar el cliente: ' . $e->getMessage());
            return redirect()->route('clientes.index')->withErrors('El cliente que desea eliminar tiene información relacionada. Comuníquese con el Administrador');
        } catch (Exception $e) {
            Log::error('Error inesperado al eliminar el cliente: ' . $e->getMessage());
            return redirect()->route('clientes.index')->withErrors('Ocurrió un error inesperado al eliminar el cliente. Comuníquese con el Administrador');
        }
    }

    public function cambioestadocliente(Request $request)
    {
        $cliente = Cliente::find($request->id);
        $cliente->estado = $request->estado;
        $cliente->save();
    }
}
