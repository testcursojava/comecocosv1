<?php
    include_once("Repository.php");
    class Usuarios extends Repository{
        const TABLA = "usuarios";
        public function add($nick){
            $this->query("INSERT INTO ".self::TABLA." (nick) values (:nick)",array(array("k"=>"nick","v"=>$nick,"int"=>false)));
        }
    }
?>