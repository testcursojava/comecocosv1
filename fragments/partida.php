
    
    <center><div class="tablero">Tablero</div>
    <table>
        <thead>
            <tr><th>Nick</th><th>Acción</th></tr>
        </thead>
        <tbody id="solicitudes"></tbody>
    </table>
    <button id="cerrar"><a href="../index.php">CERRAR</a></button></center>
	<script>
        var solicitudesDOM = document.getElementById("solicitudes");
        function pintarSolicitud(solicitud){
            if(solicitud.user && solicitud.partida){
                var fila = document.createElement("tr");
                var columnaNick = document.createElement("td");
                columnaNick.innerHTML = solicitud.user.nick;
                fila.appendChild(columnaNick);
                var columnaAccion = document.createElement("td");
                var buttonAceptar = document.createElement("button");
                var buttonDenegar = document.createElement("button");
                buttonAceptar.innerHTML = "ACEPTAR";
                buttonDenegar.innerHTML = "DENEGAR";
                columnaAccion.appendChild(buttonAceptar);
                columnaAccion.appendChild(buttonDenegar);
                fila.appendChild(columnaAccion);
                solicitudesDOM.appendChild(fila);
                buttonAceptar.onclick = function(){
                    $.ajax({
                       type:"POST",
                       url:"/api/aceptarSolicitud.php",
                       data:{user:solicitud.user.id,
                                partida:solicitud.partida.id},
                        dataType: "json",
                        success: function(r){}
                    });
                }
                buttonDenegar.onclick = function(){
                    $.ajax({
                       type:"POST",
                       url:"/api/denegarSolicitud.php",
                       data:{user:solicitud.user.id,
                                partida:solicitud.partida.id},
                        dataType: "json",
                        success: function(r){}
                    });
                }
            }
        }
        function listarSolicitudes(){
            $.ajax({
                type: 'GET',
                url: "/api/solicitudes.php",
                dataType: "json",
                success: function(r){
                    solicitudesDOM.innerHTML = "";
                    for(var i=0;i<r.length;i++)
                        pintarSolicitud(r[i]);
                }
            });
        }
        setInterval(function(){
            listarSolicitudes();
        },1000);
		document.getElementById("cerrar").onclick = function(){
			
		};
	</script>
    