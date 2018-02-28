<?php
    class DBR{
        const USERNAME="root";
        const PASSWORD="";
        const HOST="localhost";
        const DB="comecocos";
        
        private $connection;
        
        function __construct(){
            $this->createConnection();
        }

        private function createConnection(){
            $username = self::USERNAME;
            $password = self::PASSWORD;
            $host = self::HOST;
            $db = self::DB;
            $this->connection = new PDO("mysql:dbname=$db;host=$host", $username, $password);
        }
        public function query($sql, $args){
            $stmt = $this->connection->prepare($sql);
            for($i=0;$i<sizeof($args);$i++){
                $arg = $args[$i];
                $stmt->bindParam(":".$arg["k"], $arg["v"], $arg["int"]?(PDO::PARAM_INT):(PDO::PARAM_STR));
            }
            $stmt->execute();
            return $stmt;
        }
        
        public function add($tabla, $args){
            $columns = "";
            $values = "";
            for($i=0;$i<sizeof($args);$i++){
                $arg = $args[$i];
                if($i>0){
                    $columns.=",";
                    $values.=",";
                }
                $columns.=$arg["k"];
                $values.=":".$arg["k"];
            }
            $sql = "INSERT INTO ".$tabla."(".$columns.") values (".$values.")";
            $stmt = $this->query($sql,$args);
            return $this->connection->lastInsertId();
        }
        
    }
?>