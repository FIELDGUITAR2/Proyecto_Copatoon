<?php

    require_once("persistencia/PartidoDAO.php");
    require_once("persistencia/Conexion.php");

    class Partido {
        private $id;
        private $fecha;
        private $hora;
        private $campeonato;

        public function __construct($id = "", $equipoLocal = "", $equipoVisitante = "", $fecha = "", $hora = "", $estadio = "", $campeonato = "") {
            $this->id = $id;
            $this->fecha = $fecha;
            $this->hora = $hora;
            $this->campeonato = $campeonato;
        }
        
        
        

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Get the value of fecha
         */ 
        public function getFecha()
        {
                return $this->fecha;
        }

        /**
         * Get the value of hora
         */ 
        public function getHora()
        {
                return $this->hora;
        }

        /**
         * Get the value of campeonato
         */ 
        public function getCampeonato()
        {
                return $this->campeonato;
        }
    }

?>