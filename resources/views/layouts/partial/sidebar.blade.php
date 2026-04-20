<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
		<img src="{{ asset('backend/dist/img/ticket_logo.png')}}" alt="Logo"  style="opacity: .8; width:200px; height:70px;">
    </a>
    <div class="sidebar">
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item">
					<a href="{{ url('/home') }}" class="nav-link">
						<i class="nav-icon fas fa-th"></i>
						<p>
							Panel De Control
						</p>
					</a>
				</li>
				
				
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-dharmachakra"></i>
						<p>Parámetros<i class="right fas fa-angle-left"></i></p>
					</a>
					<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-ticket-alt"></i>
									<p>Tickets</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-handshake"></i>
									<p>Clientes</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-users"></i>
									<p>Usuarios</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-user-tag"></i>
									<p>Tipos de Usuario</p>
								</a>
							</li>
					</ul>
				</li>
			</ul>
		</nav>
    </div>
</aside>