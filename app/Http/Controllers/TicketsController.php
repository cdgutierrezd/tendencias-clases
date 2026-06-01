<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Exception;
use App\Models\Ticket;
use App\Models\Cliente;
use App\Models\Usuario;
use App\Http\Requests\TicketRequest;
use Barryvdh\DomPDF\Facade\Pdf;

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
    public function store(TicketRequest $request)
    {
        Ticket::create($request->validated());
        return redirect()->route('tickets.index')->with('successMsg', 'El registro se guardó exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ticket = Ticket::with(['cliente', 'usuarioAsignado', 'comentarios'])->findOrFail($id);
        return view('tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ticket = Ticket::findOrFail($id);
        $clientes = Cliente::where('estado', 1)->get();
        $usuarios = Usuario::where('estado', 1)->get();
        return view('tickets.edit', compact('ticket', 'clientes', 'usuarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TicketRequest $request, string $id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->update($request->validated());
        return redirect()->route('tickets.index')->with('successMsg', 'El ticket se actualizó exitosamente');
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

    public function imprimir($id)
    {
        $ticket = Ticket::with(['cliente', 'usuarioAsignado', 'comentarios.usuario'])->findOrFail($id);

        $data = [
            'ticket' => $ticket,
            'fecha' => now()->format('d/m/Y H:i'),
        ];

        $pdf = PDF::loadView('tickets.pdf', $data)
                  ->setPaper('a4', 'portrait');

        return $pdf->stream('ticket-' . $ticket->id . '.pdf');
    }


    /**
     * Ver PDF de un ticket en el navegador.
     */
    public function viewPdf($id)
    {
        $ticket = Ticket::with(['cliente', 'usuarioAsignado', 'comentarios.usuario'])->findOrFail($id);
        $pdf = Pdf::loadView('tickets.pdf', compact('ticket'))->setPaper('a4', 'portrait');
        return $pdf->stream('ticket-' . $ticket->id . '.pdf');
    }

    /**
     * Descargar PDF de un ticket.
     */
    public function exportPdf($id)
    {
        $ticket = Ticket::with(['cliente', 'usuarioAsignado', 'comentarios.usuario'])->findOrFail($id);
        $pdf = Pdf::loadView('tickets.pdf', compact('ticket'))->setPaper('a4', 'portrait');
        return $pdf->download('ticket-' . $ticket->id . '.pdf');
    }
}
