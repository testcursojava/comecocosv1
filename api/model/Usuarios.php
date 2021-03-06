<?php
    include_once("Repository.php");
    class Usuarios extends Repository{
        const TABLA = "usuarios";
        
        protected $table = self::TABLA;
        
        /*function __construct(){
            parent::__construct();
            $this->setTable(self::TABLA);
        }*/
        
        public function register($nick){
            return $this->add(self::TABLA,array(array("k"=>"nick","v"=>$nick,"int"=>false)));
        }
        
        public function getById($id){
            $row = $this->getByIdTable(self::TABLA,$id);
            if($row==NULL)
                return NULL;
            else{
                include_once("entidades/Usuario.php");
                $user = new Usuario($row);
                return $user;
            }
        }
        
    }
?>