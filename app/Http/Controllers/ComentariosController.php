<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Exception;
use App\Models\Comentario;
use App\Models\Ticket;
use App\Models\Usuario;

class ComentariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comentarios = Comentario::all();
        return view('comentarios.index', compact('comentarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tickets = Ticket::where('estado', 1)->get();
        $usuarios = Usuario::where('estado', 1)->get();
        return view('comentarios.create', compact('tickets', 'usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Comentario::create($request->all());
        return redirect()->route('comentarios.index')->with('successMsg', 'El registro se guardó exitosamente');
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
            $comentario = Comentario::findOrFail($id);
            $comentario->delete();
            return redirect()->route('comentarios.index')->with('successMsg', 'El comentario se eliminó exitosamente');
        } catch (QueryException $e) {
            Log::error('Error al eliminar el comentario: ' . $e->getMessage());
            return redirect()->route('comentarios.index')->withErrors('El comentario que desea eliminar tiene información relacionada. Comuníquese con el Administrador');
        } catch (Exception $e) {
            Log::error('Error inesperado al eliminar el comentario: ' . $e->getMessage());
            return redirect()->route('comentarios.index')->withErrors('Ocurrió un error inesperado al eliminar el comentario. Comuníquese con el Administrador');
        }
    }

    public function cambioestadocomentario(Request $request)
    {
        $comentario = Comentario::find($request->id);
        $comentario->estado = $request->estado;
        $comentario->save();
    }
}
