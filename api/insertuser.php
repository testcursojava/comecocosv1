<?php
    include("model/Usuarios.php");
    $usuarios = new Usuarios();
    $usuarios->add($_POST["v"]);
    header("Location: index.php");
?>