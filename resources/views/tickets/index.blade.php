@extends('layouts.app')

@section('title','Listado De Tickets')

@section('content')

<div class="content-wrapper">
    <section class="content-header" style="text-align: right;">
		<div class="container-fluid">
		</div>
    </section>
	@include('layouts.partial.msg')
    <section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header bg-secondary" style="font-size: 1.75rem;font-weight: 500; line-height: 1.2; margin-bottom: 0.5rem;">
							@yield('title')
							<a href="{{ route('tickets.create') }}" class="btn btn-primary float-right" title="Nuevo"><i class="fas fa-plus nav-icon"></i></a>
						</div>
						<div class="card-body">
							<table id="example1" class="table table-bordered table-hover" style="width:100%">
								<thead class="text-primary">
									<th width="10px">ID</th>
									<th>Título</th>
									<th>Descripción</th>
									<th>Cliente</th>
									<th>Usuario Asignado</th>
									<th width="60px">Estado</th>
									<th width="90px">Acción</th>
                                </thead>
                                <tbody>
									@foreach($tickets as $ticket)
									<tr>
										<td>{{ $ticket->id }}</td>
										<td>{{ $ticket->titulo }}</td>
										<td>{{ \Illuminate\Support\Str::limit($ticket->descripcion, 50) }}</td>
										<td>{{ $ticket->cliente->nombre ?? 'N/A' }}</td>
										<td>{{ $ticket->usuarioAsignado->nombre ?? 'Sin asignar' }}</td>
										<td>
											<input data-type="ticket" data-id="{{$ticket->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" 
											data-toggle="toggle" data-on="Activo" data-off="Inactivo" {{ $ticket->estado ? 'checked' : '' }}>
										</td>
										<td>
											<a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-warning btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></a>
											<form class="d-inline delete-form" action="{{ route('tickets.destroy', $ticket->id) }}" method="POST">
												@csrf
												@method('DELETE')
												<button type="submit" class="btn btn-danger btn-sm" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
											</form>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
    </section>
 </div>
@endsection
