<?php
$id = $_SESSION["id"];
$admin = new Admin($id);
$admin->consultar();
?>
<div class="container-fluid p-0">
	<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #000;"> <!-- Fondo negro -->
		<div class="container">
			<!-- LOGO -->
			<a class="navbar-brand d-flex align-items-center text-warning fw-bold"
				href="?pid=<?php echo base64_encode('presentacion/sesionAdmin.php') ?>" style="letter-spacing: 1px;">
				<img src="img/CopatoonHF.png" alt="Copatoon" width="40" height="40"
					class="me-2 rounded-circle border border-warning">
				COPATOON
			</a>

			<button class="navbar-toggler border-warning" type="button" data-bs-toggle="collapse"
				data-bs-target="#navbarCopatoon" aria-controls="navbarCopatoon" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarCopatoon">
				<!-- Enlaces principales -->
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link text-warning fw-semibold"
							href="?pid=<?php echo base64_encode('presentacion/sesionAdmin.php') ?>"><i
								class="fa-solid fa-house me-1"></i>Inicio</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle text-warning fw-semibold" href="#" role="button"
							data-bs-toggle="dropdown" aria-expanded="false">
							Equipos
						</a>
						<ul class="dropdown-menu bg-dark border-warning">
							<li><a class="dropdown-item text-warning bg-dark"
									href="?pid=<?php echo base64_encode('presentacion/Admin/VerEquipos.php') ?>">Ver Equipos</a>
							</li>
							<li><a class="dropdown-item text-warning bg-dark"
									href="?pid=<?php echo base64_encode('presentacion/Admin/AniadirEquipo.php') ?>">Registrar</a>
							</li>
						</ul>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle text-warning fw-semibold" href="#" role="button"
							data-bs-toggle="dropdown" aria-expanded="false">
							Campeonatos
						</a>
						<ul class="dropdown-menu bg-dark border-warning">
							<li><a class="dropdown-item text-warning bg-dark"
									href="?pid=<?php echo base64_encode('presentacion/Admin/CrearCampeonato.php') ?>">Consultar</a>
							</li>
							<li><a class="dropdown-item text-warning bg-dark"
									href="?pid=<?php echo base64_encode('presentacion/Admin/CrearCampeonato.php') ?>">Crear</a>
							</li>
						</ul>
					</li>

					<li class="nav-item">
						<a class="nav-link text-danger fw-semibold"
							href="?pid=<?php echo base64_encode('presentacion/partidos/reportePartidos.php') ?>">Reportes</a>
					</li>
				</ul>

				<!-- Usuario / Administrador -->
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle text-warning fw-bold" href="#" role="button"
							data-bs-toggle="dropdown" aria-expanded="false">
							<i class="fa-solid fa-user-shield me-1"></i>
							<?php echo $admin->getNombre() . " " . $admin->getApellido(); ?>
						</a>
						<ul class="dropdown-menu dropdown-menu-end bg-dark border-warning">
							<li><a class="dropdown-item text-warning bg-dark"
									href="?pid=<?php echo base64_encode('presentacion/admin/editarPerfil.php') ?>">Editar
									Perfil</a></li>
							<li>
								<hr class="dropdown-divider border-warning">
							</li>
							<li><a class="dropdown-item text-danger bg-dark fw-bold"
									href="?pid=<?php echo base64_encode('presentacion/autenticar.php') ?>&sesion=false">
									<i class="fa-solid fa-right-from-bracket me-1"></i> Cerrar Sesión
								</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</div>