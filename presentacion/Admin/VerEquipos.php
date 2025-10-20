<?php

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
                            foreach ($listaEquipos as $e) {
                                echo "<tr>";
                                echo "<td>" . $e->getId() . "</td>";
                                echo "<td class='fw-semibold'>" . $e->getNombre() . "</td>";
                                echo "<td>" . $e->getPais()->getNombre() . "</td>";
                                echo "<td>" . $e->getCampeonato()->getNombreCampeonato() . "</td>";
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