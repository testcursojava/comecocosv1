<?php
    include_once("Repository.php");
    class Solicitudes extends Repository{
        
        const TABLA = "solicitudes";
        
        public function register($user,$partida){
            return $this->add(self::TABLA,array(
                array("k"=>"partida","v"=>$partida,"int"=>true),
                array("k"=>"user","v"=>$user,"int"=>true))
                );
        }
        
        public function listar($partida){
            include_once("entidades/Solicitud.php");
            $stmt = $this->query("select * from ".self::TABLA,array());
            $result = $stmt->fetchAll();
            $stmt->closeCursor();
            $lista = array();
            for($i=0;$i<sizeof($result);$i++){
                $solicitud = new Solicitud($result[$i]);
                $lista[] = $solicitud->get();
            }
            /*while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $solicitud = new Solicitud($row);
                $lista[] = $solicitud->get();
            }*/
            return $lista;
        }
        
    }
?>