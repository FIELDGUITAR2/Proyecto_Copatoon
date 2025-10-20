<?php
session_start();
require_once("logica/Admin.php");
require_once("logica/Campeonato.php");
require_once("logica/Pais.php");
require_once("logica/Equipo.php");
require_once("persistencia/Conexion.php");

if (!isset($_SESSION["id"]) || $_SESSION["rol"] != "admin") {
    header("Location: ?pid=" . base64_encode("presentacion/autenticar.php"));
    exit();
}

if (isset($_POST["insertar"])) {
    $nombre = trim($_POST["nombreEquipo"]);
    $idCampeonato = $_POST["campeonato"];
    $idPais = $_POST["paisOrigen"];

    if (!empty($nombre) && !empty($idCampeonato) && !empty($idPais)) {
        
    } else {
        $mensaje = '<div class="alert alert-warning text-center fw-semibold mt-3">⚠️ Todos los campos son obligatorios.</div>';
    }
}
?>

<?php
include "presentacion/encabezado.php";
include "presentacion/menuAdmin.php";
?>

<body class="bg-light">
    <div class="container my-5">

        <!-- CARD: Insertar Equipo -->
        <div class="card border-0 shadow-lg mx-auto" style="max-width: 650px;">
            <div class="card-header text-center fw-bold text-white" style="background-color: #b30000;">
                <i class="fas fa-users me-2"></i> Añadir Nuevo Equipo
            </div>

            <div class="card-body bg-light p-4">
                <form method="post" action="?pid=<?php base64_encode("logica/Admin/AniadirEquipo.php") ?>">
                    <div class="mb-3">
                        <label for="nombreEquipo" class="form-label fw-semibold" style="color: #b30000;">
                            Nombre del Equipo
                        </label>
                        <input type="text" class="form-control border-warning" id="nombreEquipo" name="nombreEquipo"
                            placeholder="Ej: Tigres FC" required>
                    </div>

                    <div class="mb-3">
                        <label for="paisOrigen" class="form-label fw-semibold" style="color: #b30000;">País de Origen</label>
                        <select class="form-select border-warning" id="paisOrigen" name="paisOrigen" required>
                            <option value="">Seleccione un país...</option>
                            <?php
                            
                            $pais = new Pais();
                            
                            $listaPaises = $pais->consultarPaises();
                            foreach ($listaPaises as $p) {
                                echo "<option value='" . $p->getIdPais() . "'>" . $p->getNombrePais() . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="campeonato" class="form-label fw-semibold" style="color: #b30000;">Campeonato</label>
                        <select class="form-select border-warning" id="campeonato" name="campeonato" required>
                            <option value="">Seleccione un campeonato...</option>
                            <?php
                            $campeonato = new Campeonato();
                            $listaCampeonatos = $campeonato->Mostrar();
                            foreach ($listaCampeonatos as $c) {
                                echo "<option value='" . $c->getId() . "'>" . $c->getNombreCampeonato() . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn fw-bold px-4 w-100" style="background-color: #000; color: #ffc107;" name="insertar">
                            <i class="fas fa-plus-circle me-2"></i>Agregar Equipo
                        </button>
                    </div>
                </form>
            </div>

            <div class="card-footer text-center text-muted bg-dark border-top border-warning">
                <small class="fw-semibold text-warning">© 2025 Copatoon</small>
            </div>
        </div>
    </div>
</body>
