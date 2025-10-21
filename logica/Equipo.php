<?php

require_once("persistencia/Conexion.php");
require_once("persistencia/EquipoDAO.php");
require_once("logica/CampeonatoEquipo.php");
require_once("logica/Campeonato.php");
require_once("logica/Pais.php");

class Equipo
{
    private $id;
    private $pais;
    private $nombre;

    public function __construct($id = "", $pais = "", $nombre = "")
    {
        $this->id = $id;
        $this->pais = $pais;
        $this->nombre = $nombre;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of pais
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    public function MostrarEquipoCampeonato()
    {
        $conexion = new Conexion();
        $equipoDAO = new EquipoDAO();
        $conexion->abrir();
        $conexion->ejecutar($equipoDAO->MostrarEquipoCampeonato());
        $resultados = $conexion->getResultado();
        $equipos = array();
        while (($datos = $conexion->registro()) != null) {
            $pais = new Pais("",$datos[2]);
            $equipo = new Equipo($datos[0],$pais, $datos[1]);
            $campeonato = new Campeonato("",$datos[3]);
            $campeonatoEquipo = new CampeonatoEquipo("",$campeonato,
            $equipo);
            array_push($equipos, $campeonatoEquipo);
        }
        $conexion->cerrar();
        return $equipos;
    }
}

?>