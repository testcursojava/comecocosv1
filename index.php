<!DOCTYPE>
<html>
    <head>
            <link rel="stylesheet" href="estilos.css">
            <title>PacMan</title>
        </head>
    <body>
        <header>
                <div class="logo">
                    <h1> PAC-MAN </h1>
                </div>
            </header>
<?php
	session_start();
	if(isset($_SESSION["user"]) && $_SESSION["user"]!=NULL){
		if(isset($_SESSION["partida"]) && $_SESSION["partida"]!=NULL)
            include("fragments/partida.php");
		else
            include("fragments/partidas.php");
	}else
        include("fragments/registerUser.php");
?>
	</body>
</html>