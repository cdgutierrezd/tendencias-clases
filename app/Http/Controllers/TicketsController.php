<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Exception;
use App\Models\Ticket;
use App\Models\Cliente;
use App\Models\Usuario;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::all();
        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::where('estado', 1)->get();
        $usuarios = Usuario::where('estado', 1)->get();
        return view('tickets.create', compact('clientes', 'usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Ticket::create($request->all());
        return redirect()->route('tickets.index')->with('successMsg', 'El registro se guardó exitosamente');
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
            $ticket = Ticket::findOrFail($id);
            $ticket->delete();
            return redirect()->route('tickets.index')->with('successMsg', 'El ticket se eliminó exitosamente');
        } catch (QueryException $e) {
            Log::error('Error al eliminar el ticket: ' . $e->getMessage());
            return redirect()->route('tickets.index')->withErrors('El ticket que desea eliminar tiene información relacionada. Comuníquese con el Administrador');
        } catch (Exception $e) {
            Log::error('Error inesperado al eliminar el ticket: ' . $e->getMessage());
            return redirect()->route('tickets.index')->withErrors('Ocurrió un error inesperado al eliminar el ticket. Comuníquese con el Administrador');
        }
    }

    public function cambioestadoticket(Request $request)
    {
        $ticket = Ticket::find($request->id);
        $ticket->estado = $request->estado;
        $ticket->save();
    }
}
