<!DOCTYPE>
<html>
    <body>
        
<?php
	session_start();
	if(isset($_SESSION["user"]) && $_SESSION["user"]!=NULL){
		if(isset($_SESSION["partida"]) && $_SESSION["partida"]!=NULL){
?>
	<div>Tablero</div>
	<button id="cerrar">CERRAR</button>
	<script>
		document.getElementById("cerrar").onclick = function(){
			
		}
	</script>
<?php
		}else{
            include("api/model/Partidas.php");
            $reppartida = new Partidas();
            $partidas = $reppartida->listar();
            echo json_encode($partidas);
?>

		<form action="api/insertpartida.php" method="post">
            <input name="v" placeholder="NOMBRE"/><br>
            <input type="submit" value="CREAR"/>
        </form>

<?php
		}
	}else{
?>
		
		<form action="api/insertuser.php" method="post">
            <input name="v" placeholder="NICK"/><br>
            <input type="submit" value="ACCEDER"/>
        </form>
		
<?php
	}
?>
	</body>
</html>