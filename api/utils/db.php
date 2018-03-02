<?php
    class DBR{
        const USERNAME="root";
        const PASSWORD="";
        const HOST="localhost";
        const DB="comecocos";
        
        private $connection = NULL;
        
        function __construct(){
            //$this->createConnection();
        }

        private function createConnection(){
            $username = self::USERNAME;
            $password = self::PASSWORD;
            $host = self::HOST;
            $db = self::DB;
            $this->connection = new PDO("mysql:dbname=$db;host=$host", $username, $password);
        }
        private function execq($sql, $args){
            try { 
                $stmt = $this->connection->prepare($sql);
                for($i=0;$i<sizeof($args);$i++){
                    $arg = $args[$i];
                    $stmt->bindParam(":".$arg["k"], $arg["v"], $arg["int"]?(PDO::PARAM_INT):(PDO::PARAM_STR));
                }
                $stmt->execute();
            }catch(PDOExecption $e) { 
                $this->connection->rollBack(); 
                print "Error!: " . $e->getMessage() . "</br>"; 
            }
            return $stmt;
        }
        
        public function query($sql, $args){
            $this->createConnection();
            return $this->execq($sql,$args);
            //$this->close();
        }
        
        public function add($tabla, $args){
            $this->createConnection();
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
            $stmt = $this->execq($sql,$args);
            $id = $this->connection->lastInsertId();
            $this->close();
            return $id;
        }
        
        public function close(){
            /*if($this->connection!=NULL){
                $this->connection->close();
                $this->connection = NULL;
            }*/
        }
        
    }
?>