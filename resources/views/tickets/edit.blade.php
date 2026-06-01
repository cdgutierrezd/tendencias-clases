@extends('layouts.app')

@section('title', 'Editar Ticket')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid"></div>
    </section>
    @include('layouts.partial.msg')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-secondary">
                            <h3>@yield('title')</h3>
                        </div>
                        <form method="POST" action="{{ route('tickets.update', $ticket->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Título <strong style="color:red;">(*)</strong></label>
                                            <input type="text" class="form-control" name="titulo" placeholder="Título del ticket" autocomplete="off" value="{{ old('titulo', $ticket->titulo) }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Cliente <strong style="color:red;">(*)</strong></label>
                                            <select class="form-control" name="cliente_id">
                                                <option value="">Seleccione Cliente</option>
                                                @foreach($clientes as $cliente)
                                                    <option value="{{ $cliente->id }}" {{ old('cliente_id', $ticket->cliente_id) == $cliente->id ? 'selected' : '' }}>
                                                        {{ $cliente->nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Usuario Asignado</label>
                                            <select class="form-control" name="usuario_asignado_id">
                                                <option value="">Sin asignar</option>
                                                @foreach($usuarios as $usuario)
                                                    <option value="{{ $usuario->id }}" {{ old('usuario_asignado_id', $ticket->usuario_asignado_id) == $usuario->id ? 'selected' : '' }}>
                                                        {{ $usuario->nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Fecha de Creación</label>
                                            <input type="date" class="form-control" name="fecha_creacion" value="{{ old('fecha_creacion', is_object($ticket->fecha_creacion) ? $ticket->fecha_creacion->format('Y-m-d') : $ticket->fecha_creacion) }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Descripción</label>
                                            <textarea class="form-control" name="descripcion" rows="4" placeholder="Descripción del ticket">{{ old('descripcion', $ticket->descripcion) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-2 col-xs-4">
                                        <button type="submit" class="btn btn-primary btn-block btn-flat">Actualizar</button>
                                    </div>
                                    <div class="col-lg-2 col-xs-4">
                                        <a href="{{ route('tickets.index') }}" class="btn btn-danger btn-block btn-flat">Atrás</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection