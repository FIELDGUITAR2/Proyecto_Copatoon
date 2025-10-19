<?php

require_once("persistencia/Conexion.php");
class Partido_EquipoDAO
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
        return "SELECT 
            cam.nombreCampeonato,
            p.fechaPartido,
            p.horaPartido,
            eq.nombreEquipo
        FROM Partido_Equipo pe 
        INNER JOIN Partido p ON pe.idPartido = p.idPartido
        INNER JOIN Equipo eq ON pe.idEquipo = eq.idEquipo
        INNER JOIN Campeonato cam ON p.idCampeonato = cam.idCampeonato
        
        ";
    }

    /*WHERE 
            p.fechaPartido > CURDATE()
            OR (p.fechaPartido = CURDATE() AND p.horaPartido > CURRENT_TIME())
        ORDER BY 
            p.fechaPartido ASC, 
            p.horaPartido ASC;*/

}
?>