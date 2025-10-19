<?php
require_once("logica/Partido_Equipo.php");
require_once("logica/Partido.php");
require_once("logica/Equipo.php");

$parquep = new Partido_Equipo();
$partidosProximos = $parquep->MostrarProximosPartidos();

if (!empty($partidosProximos)) {
    foreach ($partidosProximos as $partido) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($partido->getPartido()->getCampeonato()->getNombreCampeonato()) . '</td>';
        echo '<td>' . htmlspecialchars($partido->getPartido()->getFecha()) . '</td>';
        echo '<td>' . htmlspecialchars($partido->getPartido()->getHora()) . '</td>';
        echo '<td>' . htmlspecialchars($partido->getEquipo()->getNombre()) . '</td>';
        echo '</tr>';
    }
} else {
    echo '<tr>';
    echo '<td colspan="4" class="text-center text-muted">No hay partidos próximos programados</td>';
    echo '</tr>';
}
?>
         
