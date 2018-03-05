<?php
    session_start();
    include("model/Partidas.php");
    $partidas = new Partidas();
    if(isset($_SERVER["user"])&&isset($_SERVER["partida"])&&$partidas->isAdmin($_SESSION["user"],$_SESSION["partida"])){
        include("model/Solicitudes.php");
        $solicitudes = new Solicitudes();
        echo json_encode($solicitudes->listar($_SESSION["partida"]));
    }else
        echo "[]";
?>