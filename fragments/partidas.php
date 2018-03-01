<?php
    include("api/model/Partidas.php");
    $reppartida = new Partidas();
    $partidas = $reppartida->listar();
?>
    <ul>
<?php
    for($i=0;$i<sizeof($partidas);$i++){
        $partida = $partidas[$i];
?>
        <li><a href="api/solicitar.php?p=<?php echo $partida["id"];?>"><?php echo $partida["nombre"]; ?></a></li>
<?php
    }
?>
    </ul>

    <form action="api/insertpartida.php" method="post">
        <input name="v" placeholder="NOMBRE"/><br>
        <input type="submit" value="CREAR"/>
    </form>