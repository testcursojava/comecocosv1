<?php
    class Solicitud{
        public $user;
        public $partida;
        
        function __construct($row){
            include_once("../Usuarios.php");
            $usuarios = new Usuarios();
            $this->user = $usuarios->getById($row["user"]);
            include_once("../Partidas.php");
            $partidas = new Partidas();
            $this->partida = $partidas->getById($row["partida"]);
        }
        
        public function get(){
            $respuesta = array();
            if($this->user!=NULL)
                $respuesta["user"]=$this->user->get();
            if($this->partida!=NULL)
                $respuesta["partida"]=$this->partida->get();
        }
        
    }
?>