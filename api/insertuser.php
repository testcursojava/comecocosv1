<?php
    session_start();
    include("model/Usuarios.php");
    $usuarios = new Usuarios();
    $_SESSION["user"] = $usuarios->register($_POST["v"]);
    header("Location: ../index.php");
?>