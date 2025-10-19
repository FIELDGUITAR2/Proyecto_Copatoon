<?php

    class Campeonato{
        private $id;
        private $nombreCampeonato;
        private $fechaInicio;
        private $fechaFin;

        public function __construct($id = "", $nombreCampeonato = "", $fechaInicio = "", $fechaFin = "") {
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
    }

?>