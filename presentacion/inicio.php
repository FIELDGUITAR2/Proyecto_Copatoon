<body class="bg-light text-dark">
	<?php include("presentacion/encabezado.php")?>

	<nav class="navbar navbar-expand-lg" style="background-color: #b30000;">
		<div class="container">
			<a class="navbar-brand fw-bold text-warning fs-4" href="#">
				Copatoon
			</a>

			<button class="navbar-toggler bg-warning" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse justify-content-end" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link text-warning fw-semibold" href="?pid=<?php echo base64_encode("presentacion/autenticar.php") ?>">
							<i class="fas fa-user me-1"></i>Autenticar
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container my-5">
		<div class="text-center mb-5">
			<h2 class="fw-bold" style="color: #b30000;">Campeonatos en curso</h2>
			<p class="opacity-75" style="color: #000;">Sigue los partidos y equipos de la liga Copatoon</p>
		</div>

		<div class="row mt-3">
			<div class="col">
				<div class="card border-0 shadow-lg">
					<div class="card-header text-white fw-bold" style="background-color: #b30000;">
						<h4 class="mb-0"><i class="fas fa-futbol me-2"></i>Próximos Partidos</h4>
					</div>
					<div class="card-body bg-light text-dark">
						<p class="text-muted">No hay partidos programados por el momento.</p>
					</div>
				</div>
			</div>
		</div>

		<div class="row mt-4">
			<div class="col">
				<div class="card border-0 shadow-lg">
					<div class="card-header text-white fw-bold" style="background-color: #000000;">
						<h4 class="mb-0"><i class="fas fa-users me-2"></i>Equipos</h4>
					</div>
					<div class="card-body bg-warning text-dark">
						<p class="fw-semibold">Próximamente se mostrarán los equipos registrados.</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<footer class="text-center py-3 mt-5" style="background-color: #b30000;">
		<p class="mb-0 text-warning fw-semibold">© 2025 Copatoon - Todos los derechos reservados</p>
	</footer>
</body>
