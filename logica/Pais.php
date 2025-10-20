<?php
require_once("persistencia/Conexion.php");
require_once("persistencia/PaisDAO.php");

class Pais
{
    private $nombrePais;
    private $idPais;
    private $region;

    public function __construct($idPais = "", $nombrePais = "", $region = "")
    {
        $this->idPais = $idPais;
        $this->nombrePais = $nombrePais;
        $this->region = $region;
    }


    /**
     * Get the value of nombrePais
     */
    public function getNombrePais()
    {
        return $this->nombrePais;
    }

    /**
     * Get the value of idPais
     */
    public function getIdPais()
    {
        return $this->idPais;
    }

    /**
     * Get the value of region
     */
    public function getRegion()
    {
        return $this->region;
    }

    public function consultarPaises()
    {
        $conexion = new Conexion();
        $paisDAO = new PaisDAO();
        $conexion->abrir();
        $conexion->ejecutar($paisDAO->consultarPaises());
        $paises = array();
        while (($datos = $conexion->registro()) != null) {
            $pais = new Pais($datos[0], $datos[1], $datos[2]);
            array_push($paises, $pais);
        }
        $conexion->cerrar();
        return $paises;
    }
}
?>