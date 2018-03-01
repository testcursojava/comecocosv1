<?php
    session_start();
    include_once("model/Solicitudes.php");
    $solicitudes = new Solicitudes();
    $solicitudes->register($_SESSION["user"],$_GET["p"]);
    header("Location: ../index.php");
?>