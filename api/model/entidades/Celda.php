<?php
    class Celda{
        public $id;
        public $partida;
        public $x;
        public $y;
        public $oc;
        public $isComida;
        public $movimiento;
        function __construct($row){
            $this->id = intval($row["id"]);
            include_once($_SERVER["DOCUMENT_ROOT"]."/api/model/Partidas.php");
            $partidas = new Partidas();
            $this->partida = $partidas->getById($row["partida"]);
            $this->x = intval($row["x"]);
            $this->y = intval($row["y"]);
            $this->movimiento = intval($row["movimiento"]);
            $this->isComida = intval($row["oc"])==0;
            if($this->isComida)
                $this->oc = 0;
            else{
                include_once($_SERVER["DOCUMENT_ROOT"]."/api/model/Roles.php");
                $roles = new Roles();
                $this->oc = $roles->getByUser($row["oc"]);
            }
        }
    }
?>