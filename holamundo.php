<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Untitled</title>
</head>
<style>
	#caja{
		position: absolute;
		background-color: yellow;
		width:50px;
		height: 50px;
	}
</style>
<body>

<?php
	$variable1 = "hola mundo";
	echo "<p>".$variable1." 2</p>";
?>
<?php
	$list = array();
	$list[0] = 0;
	$list[1] = 1;
	for($i=2;$i<10;$i++)
		$list[$i] = $list[$i-2]+$list[$i-1];
	echo json_encode($list);
	$s = 0;
	for($i=0;$i<sizeof($list);$i++){
		if($list[$i] % 2 == 0)
			$s=$s + $list[$i];		
	}
	echo "<p>Sumatorio es: ".$s."</p>";
	
	$nprimos = 25000;
	$primos = array();
	$start = microtime(true);
	for($i=2;$i<=$nprimos;$i++){
		$finddiv = false;
		for($j=0;($j<sizeof($primos) && !$finddiv);$j++){
			if($i % $primos[$j] == 0)
				$finddiv = true;
		}
		if(!$finddiv)
			$primos[] = $i;
	}
	
	/*for($i=2;$i<=$nprimos;$i++){
		$finddiv = false;
		for($j=2;($j<$i && !$finddiv);$j++){
			if($i % $j == 0)
				$finddiv = true;
		}
		if(!$finddiv)
			$primos[] = $i;
	}*/
	$end = microtime(true);
	echo json_encode($primos);
	$mctime = $end-$start;
	echo "<p>tiempo: ".$mctime." sgs</p>";
?>

<div id="caja" style="top:200px;left: 200px;"></div>
</body>
<script>
	var caja = document.getElementById("caja");
	var ALFA = 5;
	document.body.onkeydown = function(ev){
		var event = window.event ? window.event : ev;
		var top = parseInt(caja.style.top);
		var left = parseInt(caja.style.left);
		switch(event.keyCode){
			case 37://left
				left-=ALFA;
				break;
			case 38://up
				top-=ALFA;
				break;
			case 39://right
				left+=ALFA;
				break;
			case 40://down
				top+=ALFA;
				break;
		}
		caja.style.left = left+"px";
		caja.style.top = top+"px";
		return false;
	}
</script>
</html>
