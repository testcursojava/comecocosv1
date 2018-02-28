<?php
    session_start();
    include("model/Partidas.php");
    $usuarios = new Partidas();
    $_SESSION["partida"] = $usuarios->register($_POST["v"],$_SESSION["user"]);
    header("Location: ../index.php");
?>