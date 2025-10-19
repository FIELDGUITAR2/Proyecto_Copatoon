<?php

    class PartidoDAO {
        private $id;
        private $equipoLocal;
        private $equipoVisitante;
        private $fecha;
        private $hora;
        private $estadio;
        private $campeonato;

        public function __construct($id, $equipoLocal, $equipoVisitante, $fecha, $hora, $estadio, $campeonato) {
            $this->id = $id;
            $this->equipoLocal = $equipoLocal;
            $this->equipoVisitante = $equipoVisitante;
            $this->fecha = $fecha;
            $this->hora = $hora;
            $this->estadio = $estadio;
            $this->campeonato = $campeonato;
        }
        
        // Getters and setters for each attribute can be added here

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Get the value of equipoLocal
         */ 
        public function getEquipoLocal()
        {
                return $this->equipoLocal;
        }

        /**
         * Get the value of equipoVisitante
         */ 
        public function getEquipoVisitante()
        {
                return $this->equipoVisitante;
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
         * Get the value of estadio
         */ 
        public function getEstadio()
        {
                return $this->estadio;
        }

        /**
         * Get the value of campeonato
         */ 
        public function getCampeonato()
        {
                return $this->campeonato;
        }

        public function MostrarProximos(){
            return "
            SELECT 
            cam.nombreCampeonato,
            p.fechaPartido,
            p.horaPartido,
            eq.nombreEquipo
            FROM Partido_Equipo pe 
            INNER JOIN Partido p ON pe.idPartido = p.idPartido
            INNER JOIN Equipo eq ON pe.idEquipo = eq.idEquipo
            INNER JOIN Campeonato cam ON p.idCampeonato = cam.idCampeonato
            WHERE 
                p.fechaPartido > CURDATE()
                OR (p.fechaPartido = CURDATE() AND p.horaPartido > CURRENT_TIME())
            ORDER BY 
                p.fechaPartido ASC, 
                p.horaPartido ASC;

            ";
        }
    }

?>