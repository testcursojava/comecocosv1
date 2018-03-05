<?php
    class Partida{
        public $id;
        public $nombre;
        public $fecha;
        public $admin;
        
        function __construct($row){
            $this->id = intval($row["id"]);
            $this->nombre = $row["nombre"];
            $this->fecha = $row["fecha"];
            $this->admin = intval($row["admin"]);
        }
        
        public function get(){
            return array("id"=>$this->id,"nombre"=>$this->nombre,"fecha"=>$this->fecha,"admin"=>$this->admin);
        }
        
    }
?>