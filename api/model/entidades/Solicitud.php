<?php
    class Solicitud{
        public $user;
        public $partida;
        public $aceptado;
        
        function __construct($row){
            $basemodel = $_SERVER["DOCUMENT_ROOT"]."/api/model/";
            include_once($basemodel."Usuarios.php");
            $usuarios = new Usuarios();
            $this->user = $usuarios->getById($row["user"]);
            include_once($basemodel."Partidas.php");
            $partidas = new Partidas();
            $this->partida = $partidas->getById($row["partida"]);
            $this->aceptado = intval($row["aceptado"])==1;
        }
        
        public function get(){
            $respuesta = array();
            if($this->user!=NULL)
                $respuesta["user"]=$this->user->get();
            if($this->partida!=NULL)
                $respuesta["partida"]=$this->partida->get();
            $respuesta["aceptado"] = $this->aceptado;
            return $respuesta;
        }
        
    }
?>