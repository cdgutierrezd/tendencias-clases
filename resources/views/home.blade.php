@extends('layouts.app')

@section('title','Panel De Control')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@yield('title')</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $totalTickets }}</h3>
                            <p>Total Tickets</p>
                        </div>
                        <div class="icon"><i class="fas fa-ticket-alt"></i></div>
                        <a href="{{ route('tickets.index') }}" class="small-box-footer">Ver todos <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $ticketsSinAsignar }}</h3>
                            <p>Tickets Sin Asignar</p>
                        </div>
                        <div class="icon"><i class="fas fa-exclamation-circle"></i></div>
                        <a href="{{ route('tickets.index') }}" class="small-box-footer">Ver tickets <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $totalClientes }}</h3>
                            <p>Total Clientes</p>
                        </div>
                        <div class="icon"><i class="fas fa-users"></i></div>
                        <a href="{{ route('clientes.index') }}" class="small-box-footer">Ver clientes <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $totalUsuarios }}</h3>
                            <p>Total Usuarios</p>
                        </div>
                        <div class="icon"><i class="fas fa-user-cog"></i></div>
                        <a href="{{ route('usuarios.index') }}" class="small-box-footer">Ver usuarios <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>{{ $totalComentarios }}</h3>
                            <p>Total Comentarios</p>
                        </div>
                        <div class="icon"><i class="fas fa-comments"></i></div>
                        <a href="{{ route('comentarios.index') }}" class="small-box-footer">Ver comentarios <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>{{ $ticketsActivos }}</h3>
                            <p>Tickets Activos</p>
                        </div>
                        <div class="icon"><i class="fas fa-check-circle"></i></div>
                        <a href="{{ route('tickets.index') }}" class="small-box-footer">Ver tickets <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection
