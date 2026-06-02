@extends('layouts.app')

@section('title','Ver Ticket')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid"></div>
    </section>
    @include('layouts.partial.msg')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-secondary" style="font-size:1.75rem;font-weight:500;line-height:1.2;margin-bottom:0.5rem;">
                            @yield('title') #{{ $ticket->id }}
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Título</label>
                                        <p>{{ $ticket->titulo }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Estado</label>
                                        <p>
                                            <span class="badge {{ $ticket->estado ? 'badge-success' : 'badge-danger' }}">
                                                {{ $ticket->estado ? 'Activo' : 'Inactivo' }}
                                            </span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Cliente</label>
                                        <p>{{ $ticket->cliente->nombre ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Usuario Asignado</label>
                                        <p>{{ $ticket->usuarioAsignado?->nombre ?? 'Sin asignar' }} {{ $ticket->usuarioAsignado ? '(' . $ticket->usuarioAsignado->tipoUsuario?->nombre_tipo . ')' : '' }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Fecha de Creación</label>
                                        <p>{{ $ticket->fecha_creacion ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Fecha de Cierre</label>
                                        <p>{{ $ticket->fecha_cierre ?? 'Sin cerrar' }}</p>
                                    </div>
                                </div>
                                @if($ticket->imagen)
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Imagen</label>
                                        <p>
                                            <img src="{{ asset('storage/' . $ticket->imagen) }}" alt="Imagen del ticket" style="max-width: 100%; height: auto; border: 1px solid #ddd; padding: 6px;" />
                                        </p>
                                    </div>
                                </div>
                                @endif
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Descripción</label>
                                        <p>{{ $ticket->descripcion ?? 'Sin descripción' }}</p>
                                    </div>
                                </div>
                                @if($ticket->imagen)
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Imagen</label><br>
                                        <img src="{{ asset('storage/' . $ticket->imagen) }}" alt="Imagen del ticket" style="max-width:300px; border-radius:6px;">
                                    </div>
                                </div>
                                @endif
                            </div>

                            @if($ticket->comentarios->count())
                            <hr>
                            <h5>Comentarios ({{ $ticket->comentarios->count() }})</h5>
                            <div class="row">
                                @foreach($ticket->comentarios as $comentario)
                                <div class="col-lg-12">
                                    <div class="card card-outline card-info mb-2">
                                        <div class="card-body py-2">
                                            <strong>{{ $comentario->usuario?->nombre ?? 'N/A' }} {{ $comentario->usuario ? '(' . $comentario->usuario->tipoUsuario?->nombre_tipo . ')' : '' }}</strong>
                                            <span class="text-muted float-right">{{ $comentario->fecha }}</span>
                                            <p class="mb-0 mt-1">{{ $comentario->mensaje }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-2 col-xs-4">
                                    <a href="{{ route('tickets.viewPdf', $ticket->id) }}" target="_blank" class="btn btn-danger btn-block btn-flat"><i class="fas fa-eye"></i> Ver PDF</a>
                                </div>
                                <div class="col-lg-2 col-xs-4">
                                    <a href="{{ route('tickets.exportPdf', $ticket->id) }}" class="btn btn-danger btn-block btn-flat"><i class="fas fa-download"></i> Descargar PDF</a>
                                </div>
                                <div class="col-lg-2 col-xs-4">
                                    <a href="{{ route('tickets.index') }}" class="btn btn-secondary btn-block btn-flat">Atrás</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
