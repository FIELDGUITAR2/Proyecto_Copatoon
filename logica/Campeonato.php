<?php

require_once("persistencia/Conexion.php");
require_once("persistencia/CampeonatoDAO.php");

class Campeonato
{
        private $id;
        private $nombreCampeonato;
        private $fechaInicio;
        private $fechaFin;

        public function __construct($id = "", $nombreCampeonato = "", $fechaInicio = "", $fechaFin = "")
        {
                $this->id = $id;
                $this->nombreCampeonato = $nombreCampeonato;
                $this->fechaInicio = $fechaInicio;
                $this->fechaFin = $fechaFin;
        }

        /**
         * Get the value of id
         */
        public function getId()
        {
                return $this->id;
        }

        /**
         * Get the value of nombreCampeonato
         */
        public function getNombreCampeonato()
        {
                return $this->nombreCampeonato;
        }

        /**
         * Get the value of fechaInicio
         */
        public function getFechaInicio()
        {
                return $this->fechaInicio;
        }

        /**
         * Get the value of fechaFin
         */
        public function getFechaFin()
        {
                return $this->fechaFin;
        }

        public function insertar()
        {
                if ($this->nombreCampeonato == "" || $this->fechaInicio == "" || $this->fechaFin == "") {
                        return false;
                }
                $conexion = new Conexion();
                $campeonatoDAO = new CampeonatoDAO("", $this->nombreCampeonato, $this->fechaInicio, $this->fechaFin);
                $conexion->abrir();
                $conexion->ejecutar($campeonatoDAO->insertar());
                $conexion->cerrar();
                return true;
        }

        public function Mostrar()
        {
                $conexion = new Conexion();
                $campeonatoDAO = new CampeonatoDAO();
                $conexion->abrir();
                $conexion->ejecutar($campeonatoDAO->MostrarCampeonatos());
                $resultados = $conexion->getResultado();
                $campeonatos = array();
                while (($datos = $conexion->registro()) != null) {
                        $camp = new Campeonato($datos[0], $datos[1], $datos[2], $datos[3]);
                        array_push($campeonatos, $camp);
                }
                $conexion->cerrar();
                return $campeonatos;
        }
}

?>