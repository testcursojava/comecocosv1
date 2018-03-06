<?php
    include_once("Repository.php");
    class Solicitudes extends Repository{
        
        const TABLA = "solicitudes";
        
        protected $table = self::TABLA;
        
        public function register($user,$partida){
            return $this->add(self::TABLA,array(
                array("k"=>"partida","v"=>$partida,"int"=>true),
                array("k"=>"user","v"=>$user,"int"=>true))
                );
        }
        
        public function listar($partida){
            include_once("entidades/Solicitud.php");
            $stmt = $this->query("select * from ".self::TABLA." where partida=".$partida,array());
            $result = $stmt->fetchAll();
            //$stmt->closeCursor();
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
        
        public function eliminar($user,$partida){
            $this->query("DELETE FROM ".self::TABLA." WHERE user=:u AND partida=:p",
                         array(
                            array("k"=>"u","v"=>$user,"int"=>true),
                            array("k"=>"p","v"=>$partida,"int"=>true)
                        ));
        }
        
    }
?>