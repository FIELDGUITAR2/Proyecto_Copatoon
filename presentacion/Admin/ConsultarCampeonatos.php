<?php
require_once("logica/Admin.php");
require_once("logica/Campeonato.php");
require_once("persistencia/Conexion.php");

if (!isset($_SESSION["id"]) || $_SESSION["rol"] != "admin") {
    header("Location: ?pid=" . base64_encode("presentacion/autenticar.php"));
    exit();
}
?>

<body>
    <?php
    include "presentacion/encabezado.php";
    include "presentacion/menuAdmin.php";
    ?>

    <div class="container my-5">
    <div class="card shadow-lg border-0">
        <div class="card-header text-white fw-bold text-center" style="background-color: #b30000;">
            <i class="fas fa-list me-2"></i> Campeonatos Registrados
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover text-center mb-0 align-middle">
                    <thead class="text-white" style="background-color: #000;">
                        <tr>
                            <th>ID</th>
                            <th>Nombre Campeonato</th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Fin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $campeonato = new Campeonato();
                        $resultado = $campeonato->Mostrar();

                        if (!empty($resultado)) {
                            foreach ($resultado as $row) {
                                echo "<tr>";
                                echo "<td class='fw-bold'>" . $row->getId() . "</td>";
                                echo "<td>" . htmlspecialchars($row->getNombreCampeonato()) . "</td>";
                                echo "<td>" . $row->getFechaInicio() . "</td>";
                                echo "<td>" . $row->getFechaFin() . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4' class='text-muted py-3'>No hay campeonatos registrados.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer text-center bg-dark border-top border-warning">
            <small class="fw-semibold text-warning">© 2025 Copatoon</small>
        </div>
    </div>
</div>

    <script>
        // Validación Bootstrap
        (function () {
            'use strict'
            const forms = document.querySelectorAll('.needs-validation')
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>