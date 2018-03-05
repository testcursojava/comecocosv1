<?php
    include_once("Repository.php");
    class Partidas extends Repository{
        
        const TABLA = "partidas";
        
        protected $table = self::TABLA;
        
        public function register($nombre,$user){
            return $this->add(self::TABLA,array(array("k"=>"nombre","v"=>$nombre,"int"=>false),array("k"=>"admin","v"=>$user,"int"=>true)));
        }
        
        public function listar(){
            include_once("entidades/Partida.php");
            $stmt = $this->query("select * from ".self::TABLA,array());
            $lista = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $partida = new Partida($row);
                $lista[] = $partida->get();
            }
            return $lista;
        }
        
        public function getById($id){
            $row = $this->getByIdTable(self::TABLA,$id);
            if($row==NULL)
                return NULL;
            else{
                include_once("entidades/Partida.php");
                $partida = new Partida($row);
                return $partida;
            }
        }
        
        public function isAdmin($user,$partida){
            $finded = false;
            $stmt = $this->query("select * from ".self::TABLA." where admin=:u and id=:id",
                                 array(
                                    array("k"=>"u","v"=>$user,"int"=>true),
                                    array("k"=>"id","v"=>$partida,"int"=>true)
                                ));
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $finded = true;
            }
            return $finded;
        }
        
    }
?>