<?php
    include_once("Repository.php");
    class Roles extends Repository{
        
        const TABLA = "roles";
        
        protected $table = self::TABLA;
        
        public function register($user,$partida,$escomecoco){
            return $this->add(self::TABLA,array(
                array("k"=>"partida","v"=>$partida,"int"=>true),
                array("k"=>"user","v"=>$user,"int"=>true),
                array("k"=>"escomecoco","v"=>$escomecoco,"int"=>true)
                )
            );
        }
        
        public function getByUser($user){
            $rol = NULL;
            $stmt = $this->query("select * from ".self::TABLA." where user=:u",
                                 array(array("k"=>"u","v"=>$user,"int"=>true))
                                 );
            include_once("entidades/Rol.php");
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $rol = new Rol($row);
            }
            
            return $rol;
        }
        
    }
?>