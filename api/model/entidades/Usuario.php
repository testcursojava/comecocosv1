<?php
    class Usuario{
        public $id;
        public $nick;
        
        public function set($row){
            $this->id = intval($row["id"]);
            $this->nick = $row["nick"];
        }
        
        public function get(){
            return array("id"=>$this->id,"nick"=>$this->nick);
        }
        
    }
?>