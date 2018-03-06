<?php
    class Rol{
        public $user;
        public $partida;
        public $escomecoco;
        
        function __construct($row){
            $basemodel = $_SERVER["DOCUMENT_ROOT"]."/api/model/";
            include_once($basemodel."Usuarios.php");
            $usuarios = new Usuarios();
            $this->user = $usuarios->getById($row["user"]);
            include_once($basemodel."Partidas.php");
            $partidas = new Partidas();
            $this->partida = $partidas->getById($row["partida"]);
            $this->escomecoco = intval($row["escomecoco"])==1;
        }
        
        public function get(){
            $respuesta = array();
            if($this->user!=NULL)
                $respuesta["user"]=$this->user->get();
            if($this->partida!=NULL)
                $respuesta["partida"]=$this->partida->get();
            $respuesta["escomecoco"] = $this->escomecoco;
            return $respuesta;
        }
        
    }
?>