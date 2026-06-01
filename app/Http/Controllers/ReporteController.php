<?php

namespace App\Http\Controllers;

use App\Exports\TicketExport;
use App\Exports\TicketsExport;
use App\Models\Ticket;
use Maatwebsite\Excel\Facades\Excel;

class ReporteController extends Controller
{
    public function exportPorId($id)
    {
        $ticket = Ticket::with('cliente')->findOrFail($id);
        return Excel::download(new TicketExport($ticket), 'ticket-' . $id . '.xlsx');
    }

    public function exportGeneral()
    {
        return Excel::download(new TicketsExport, 'tickets-general.xlsx');
    }
}
