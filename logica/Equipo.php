<?php

    class Equipo{
        private $id;
        private $pais;
        private $nombre;

        public function __construct($id = "", $pais = "", $nombre = "") {
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
    }

?>