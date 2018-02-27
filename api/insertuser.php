<?php
    include("model/Usuarios.php");
    $usuarios = new Usuarios();
    $usuarios->add($_GET["v"]);
?>