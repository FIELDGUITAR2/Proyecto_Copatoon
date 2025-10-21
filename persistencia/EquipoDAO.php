<?php

    class EquipoDAO{
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

        public function MostrarEquipoCampeonato()
        {
            return "
            select e.idEquipo, e.nombreEquipo, p.nombrePais, c.nombreCampeonato 
            from Campeonato_Equipo ce
            INNER JOIN Campeonato c ON ce.idCampeonato = c.idCampeonato
            INNER JOIN Equipo e ON ce.idEquipo = e.idEquipo
            INNER JOIN Pais p ON e.idPais = p.idPais";
        }
    }

?>