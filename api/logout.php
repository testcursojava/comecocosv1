<?php
    session_start();
    include("model/Usuarios.php");
    $usuarios = new Usuarios();
    $usuarios->delete($_SESSION["user"]);
    include_once("model/Celdas.php");
    $celdas = new Celdas();
    $celdas->removeByUser($_SESSION["user"]);
    unset($_SESSION["user"]);
    unset($_SESSION["partida"]);
    session_destroy();
    echo json_encode(array("isok"=>true));
?>