<?php
    include_once("Repository.php");
    class Partidas extends Repository{
        
        const TABLA = "partidas";
        
        public function register($nombre,$user){
            return $this->add(self::TABLA,array(array("k"=>"nombre","v"=>$nombre,"int"=>false),array("k"=>"admin","v"=>$user,"int"=>true)));
        }
        
        public function listar(){
            include_once("entidades/Partida.php");
            $stmt = $this->query("select id,nombre from ".self::TABLA,array());
            $lista = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $partida = new Partida($row);
                $lista[] = $partida->get();
            }
            return $lista;
        }
        
    }
?>