<?php
require_once("logica/Equipo.php");
require_once("persistencia/Conexion.php");

if (!isset($_SESSION["id"]) || $_SESSION["rol"] != "admin") {
    header("Location: ?pid=" . base64_encode("presentacion/autenticar.php"));
    exit();
}
?>

<?php
include("presentacion/encabezado.php");
include("presentacion/menuAdmin.php");
?>

<body class="bg-light">
    <div class="container my-5">

        <div class="card border-0 shadow-lg rounded-4 mt-5">
            <div class="card-header text-white text-center fw-bold" style="background-color: #b30000;">
                <i class="fas fa-list-alt me-2"></i> Equipos Registrados
            </div>

            <div class="card-body bg-light p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle text-center mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nombre del Equipo</th>
                                <th>País</th>
                                <th>Campeonato</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $equipo = new Equipo();
                            $listaEquipos = $equipo->MostrarEquipoCampeonato();
                            foreach ($listaEquipos as $c) {
                                echo "<tr>";
                                echo "<td class='fw-semibold text-warning'>" . $c->getIdEquipo()->getId() . "</td>";
                                echo "<td>" . $c->getIdEquipo()->getNombre() . "</td>";
                                echo "<td>" . $c->getIdEquipo()->getPais()->getNombrePais() . "</td>";
                                echo "<td>" . $c->getIdCampeonato()->getNombreCampeonato() . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>