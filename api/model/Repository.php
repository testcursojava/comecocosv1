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
        
    }
?>