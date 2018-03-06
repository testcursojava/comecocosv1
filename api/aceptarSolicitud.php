<?php
    session_start();
    include("model/Partidas.php");
    $partidas = new Partidas();
    if(isset($_SESSION["user"])&&
        $partidas->isAdmin($_SESSION["user"],$_POST["partida"])){
            include("model/Solicitudes.php");
            $solicitudes = new Solicitudes();
            $solicitudes->eliminar($_POST["user"],$_POST["partida"]);
            include("model/Roles.php");
            $roles = new Roles();
            $roles->register($_POST["user"],$_POST["partida"],$_POST["escomecoco"]);
    }
    echo json_encode(array("fin"=>1));
?>