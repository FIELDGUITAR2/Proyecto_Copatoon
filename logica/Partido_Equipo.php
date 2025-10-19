<?php

require_once("persistencia/Conexion.php");
require_once("persistencia/Partido_EquipoDAO.php");
require_once("logica/Partido.php");
require_once("logica/Equipo.php");
require_once("logica/Campeonato.php");
class Partido_Equipo
{
    private $idPartido_Equipo;
    private $Partido;
    private $Equipo;
    private $Goles;
    private $idLoc_Vis;

    public function __construct($idPartido_Equipo = "", $Partido = "", $Equipo = "", $Goles = 0, $idLoc_Vis = "")
    {
        $this->idPartido_Equipo = $idPartido_Equipo;
        $this->Partido = $Partido;
        $this->Equipo = $Equipo;
        $this->Goles = $Goles;
        $this->idLoc_Vis = $idLoc_Vis;
    }

    /**
     * Get the value of idPartido_Equipo
     */
    public function getIdPartido_Equipo()
    {
        return $this->idPartido_Equipo;
    }

    /**
     * Get the value of Partido
     */
    public function getPartido()
    {
        return $this->Partido;
    }

    /**
     * Get the value of Equipo
     */
    public function getEquipo()
    {
        return $this->Equipo;
    }

    /**
     * Get the value of Goles
     */
    public function getGoles()
    {
        return $this->Goles;
    }

    /**
     * Get the value of idLoc_Vis
     */
    public function getIdLoc_Vis()
    {
        return $this->idLoc_Vis;
    }

    public function MostrarProximosPartidos()
    {
        $conexion = new Conexion();
        $parteqDAO = new Partido_EquipoDAO();
        $conexion->abrir();
        $conexion->ejecutar($parteqDAO->MostrarProximosPartidos());
        $partidos = array();
        while (($datos = $conexion->registro()) != null) {
            $equipo = new Equipo("","",$datos[3]);
            $campeonato = new Campeonato("",$datos[0]);
            $partido = new Partido(
                "",
                "",
                "",
                $datos[1],
                $datos[2],
                "",
                $campeonato
            );
            
            $partido_eq = new Partido_Equipo(
                "",
                $partido,
                $equipo,
                "",
                ""
            );
            array_push($partidos, $partido_eq);
        }
        $conexion->cerrar();
        return $partidos;
    }

}
?>