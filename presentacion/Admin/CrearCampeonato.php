<?php
require_once("logica/Admin.php");
require_once("logica/Campeonato.php");
require_once("persistencia/Conexion.php");

if (!isset($_SESSION["id"]) || $_SESSION["rol"] != "admin") {
    header("Location: ?pid=" . base64_encode("presentacion/autenticar.php"));
    exit();
}

$mensaje = "";
if (isset($_POST["insertar"])) {
    $nombre = trim($_POST["nombreCampeonato"]);
    $fechaInicio = $_POST["fechaInicio"];
    $fechaFin = $_POST["fechaFin"];

    if (!empty($nombre) && !empty($fechaInicio) && !empty($fechaFin)) {
        $campeonato = new Campeonato("", $nombre, $fechaInicio, $fechaFin);
        if ($campeonato->insertar()) {
            $mensaje = '<div class="alert alert-success text-center fw-semibold mt-3">🏆 Campeonato creado exitosamente.</div>';

            $nombre = "";
            $fechaInicio = "";
            $fechaFin = "";
        } else {
            $mensaje = '<div class="alert alert-danger text-center fw-semibold mt-3">⚠️ Error al crear el campeonato.</div>';
        }
    } else {
        $mensaje = '<div class="alert alert-warning text-center fw-semibold mt-3">⚠️ Todos los campos son obligatorios.</div>';
    }
}
?>

<body>
    <?php
    include "presentacion/encabezado.php";
    include "presentacion/menuAdmin.php";
    ?>

    <div class="card shadow-lg border-0 mx-auto my-5" style="max-width: 500px;">
        <div class="card-header text-white fw-bold text-center" style="background-color: #b30000;">
            <i class="fas fa-trophy me-2"></i> Insertar Campeonato
        </div>

        <div class="card-body bg-light">
            <form action="?pid=<?php echo base64_encode('presentacion/Admin/CrearCampeonato.php'); ?>" method="post"
                class="needs-validation" novalidate>
                <div class="mb-3 text-start">
                    <label for="nombreCampeonato" class="form-label fw-semibold" style="color: #b30000;">
                        Nombre del Campeonato
                    </label>
                    <input type="text" class="form-control border-warning" id="nombreCampeonato" name="nombreCampeonato"
                        placeholder="Ej: Copa Dorada" required>
                    <div class="invalid-feedback">
                        Por favor, ingrese un nombre para el campeonato.
                    </div>
                </div>

                <div class="mb-3 text-start">
                    <label for="fechaInicio" class="form-label fw-semibold" style="color: #b30000;">Fecha de
                        inicio</label>
                    <input type="date" class="form-control border-warning" id="fechaInicio" name="fechaInicio"
                        value="<?php echo date('Y-m-d'); ?>" min="2025-01-01" max="2025-12-31" required>
                    <div class="invalid-feedback">Seleccione una fecha válida de inicio.</div>
                </div>

                <div class="mb-3 text-start">
                    <label for="fechaFin" class="form-label fw-semibold" style="color: #b30000;">Fecha de fin</label>
                    <input type="date" class="form-control border-warning" id="fechaFin" name="fechaFin" required>
                    <div class="invalid-feedback">Seleccione una fecha válida de finalización.</div>
                </div>

                <button type="submit" class="btn fw-bold w-100" style="background-color: #000; color: #ffc107;"
                    name="insertar">
                    <i class="fas fa-save me-2"></i>Guardar Campeonato
                </button>
            </form>

            <?php echo $mensaje; ?>
        </div>

        <div class="card-footer text-center text-muted bg-dark border-top border-warning">
            <small class="fw-semibold text-warning">© 2025 Copatoon</small>
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