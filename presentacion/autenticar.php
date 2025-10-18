<?php 

require_once ("logica/Admin.php");

if(isset($_GET["sesion"])){
    if($_GET["sesion"] == "false"){
        session_destroy();
    }
}

$error=false;

if(isset($_POST["autenticar"])){
    $correo = $_POST["correo"];
    $clave = $_POST["clave"];
    $admin = new Admin("", "", "", $correo, $clave);
    if($admin -> autenticar()){
        $_SESSION["id"] = $admin -> getId();
        $_SESSION["rol"] = "admin";
        header("Location: ?pid=" . base64_encode("presentacion/sesionAdmin.php"));
    }else {
        $error=true;
    }
}
?>
<body class="bg-dark text-light">
    <?php include("presentacion/encabezado.php"); ?>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card border-warning shadow-lg">

                    <div class="card-header bg-danger text-warning text-center fw-bold">
                        <h4 class="mb-0">Autenticar</h4>
                    </div>

                    <div class="card-body bg-black text-warning">
                        <form action="?pid=<?php echo base64_encode("presentacion/autenticar.php") ?>" method="post">
                            <div class="mb-3">
                                <input type="email" class="form-control border-warning bg-dark text-light" name="correo" placeholder="Correo" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control border-warning bg-dark text-light" name="clave" placeholder="Clave" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-danger border-warning text-warning fw-bold" name="autenticar">
                                    <i class="bi bi-lock-fill me-1"></i> Autenticar
                                </button>
                            </div>
                        </form>

                        <?php 
                        if ($error){
                            echo "
                            <div class='alert alert-danger mt-3 border-warning text-warning bg-dark text-center' role='alert'>
                                Credenciales incorrectas
                            </div>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</body>
</html>

