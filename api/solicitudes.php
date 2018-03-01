<?php
    include_once("model/Solicitudes.php");
    $solicitudes = new Solicitudes();
    echo json_encode($solicitudes->listar(-1));
?>