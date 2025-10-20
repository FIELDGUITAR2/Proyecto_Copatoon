<?php
class PaisDAO{
        private $nombrePais;
        private $idPais;
        private $region;

        public function __construct($idPais="", $nombrePais="", $region=""){
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

        public function consultarPaises(){
            return "select * from Pais";
        }
    }