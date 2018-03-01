<?php
    abstract class Repository{
        protected $db;
        
        function __construct(){
            $this->init();
        }
        
        protected function init(){
            include_once($_SERVER["DOCUMENT_ROOT"]."/api/utils/db.php");
            $this->db = new DBR();
        }
        
        protected function query($sql,$args){
            return $this->db->query($sql,$args);
        }
        
        protected function add($tabla,$args){
            return $this->db->add($tabla,$args);
        }
        
        protected function getByIdTable($table,$id){
            $row = NULL;
            $stmt = $this->query("select * from ".$table." where id=:id limit 1",array(array("k"=>"id","v"=>$id,"int"=>true)));
            while($row = $stmt->fetch(PDO::FETCH_ASSOC));
            $stmt->closeCursor();
            return $row;
        }
        
    }
?>