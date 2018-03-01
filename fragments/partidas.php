<link rel="stylesheet" href="../estilos.css">
    <div class="crea">
    <center>
        <p> CREA TU PARTIDA </p>
         <img  class="imagen" width=25% height=40% src="../imgjuego/pc.gif">
        <form action="api/insertpartida.php" method="post">
        <input name="v" placeholder="NOMBRE"/><br>
        <input type="submit" value="CREAR"/>
    </form>
    </center>
    </div>
   
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
    