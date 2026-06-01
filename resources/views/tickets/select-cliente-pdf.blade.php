@extends('layouts.app')

@section('title','Seleccionar Cliente para PDF')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid"></div>
    </section>
    @include('layouts.partial.msg')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header bg-secondary" style="font-size:1.75rem;font-weight:500;line-height:1.2;margin-bottom:0.5rem;">
                            @yield('title')
                        </div>
                        <div class="card-body">
                            <p class="mb-3">Selecciona un cliente para descargar su historial de reparación:</p>
                            <div class="list-group">
                                @forelse($clientes as $cliente)
                                <a href="{{ route('tickets.exportPdf', $cliente->id) }}" 
                                   class="list-group-item list-group-item-action" 
                                   title="Descargar PDF">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">{{ $cliente->nombre }}</h5>
                                        <small>{{ $cliente->tickets()->count() }} ticket(s)</small>
                                    </div>
                                    <p class="mb-1">{{ $cliente->email ?? 'Sin email' }}</p>
                                    <small class="text-muted">{{ $cliente->telefono ?? 'Sin teléfono' }}</small>
                                </a>
                                @empty
                                <div class="alert alert-info">
                                    No hay clientes registrados
                                </div>
                                @endforelse
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('tickets.index') }}" class="btn btn-danger">Atrás</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
