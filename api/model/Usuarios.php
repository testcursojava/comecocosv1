<?php
    include_once("Repository.php");
    class Usuarios extends Repository{
        const TABLA = "usuarios";
        public function register($nick){
            return $this->add(self::TABLA,array(array("k"=>"nick","v"=>$nick,"int"=>false)));
        }
    }
?>