<?php
class CampeonatoEquipo
{
    private $idCampeonatoEquipo;
    private $idCampeonato;
    private $idEquipo;
    private $partidosJugados;
    private $partidosGanados;
    private $partidosEmpatados;
    private $partidosPerdidos;
    private $golesFavor;
    private $golesContra;
    private $puntos;

    public function __construct($idCampeonatoEquipo = "", $idCampeonato = "", $idEquipo = "", $partidosJugados = 0, $partidosGanados = 0, $partidosEmpatados = 0, $partidosPerdidos = 0, $golesFavor = 0, $golesContra = 0, $puntos = 0)
    {
        $this->idCampeonatoEquipo = $idCampeonatoEquipo;
        $this->idCampeonato = $idCampeonato;
        $this->idEquipo = $idEquipo;
        $this->partidosJugados = $partidosJugados;
        $this->partidosGanados = $partidosGanados;
        $this->partidosEmpatados = $partidosEmpatados;
        $this->partidosPerdidos = $partidosPerdidos;
        $this->golesFavor = $golesFavor;
        $this->golesContra = $golesContra;
        $this->puntos = $puntos;
    }

    public function getIdCampeonatoEquipo()
    {
        return $this->idCampeonatoEquipo;
    }

    public function getIdCampeonato()
    {
        return $this->idCampeonato;
    }

    public function getIdEquipo()
    {
        return $this->idEquipo;
    }

    public function getPartidosJugados()
    {
        return $this->partidosJugados;
    }

    public function getPartidosGanados()
    {
        return $this->partidosGanados;
    }

    public function getPartidosEmpatados()
    {
        return $this->partidosEmpatados;
    }

    public function getPartidosPerdidos()
    {
        return $this->partidosPerdidos;
    }

    public function getGolesFavor()
    {
        return $this->golesFavor;
    }

    public function getGolesContra()
    {
        return $this->golesContra;
    }

    public function getPuntos()
    {
        return $this->puntos;
    }

    

}
?>