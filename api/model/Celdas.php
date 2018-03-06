<?php
    include_once("Repository.php");
    class Celdas extends Repository{
        const TABLA = "celdas";
        
        protected $table = self::TABLA;
        
        public function removeByUser($user){
            $this->query("delete from ".self::TABLA." where oc=:u",
                         array(array("k"=>"u","v"=>$user,"int"=>true)))
        }
        
    }
?>