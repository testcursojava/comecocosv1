<?php
    class DBR{
        const USERNAME="root";
        const PASSWORD="";
        const HOST="localhost";
        const DB="comecocos";

        private function getConnection(){
            $username = self::USERNAME;
            $password = self::PASSWORD;
            $host = self::HOST;
            $db = self::DB;
            $connection = new PDO("mysql:dbname=$db;host=$host", $username, $password);
            return $connection;
        }
        public function query($sql, $args){
            $connection = $this->getConnection();
            $stmt = $connection->prepare($sql);
            for($i=0;$i<sizeof($args);$i++){
                $arg = $args[$i];
                $stmt->bindParam(":".$arg["k"], $arg["v"], $arg["int"]?(PDO::PARAM_INT):(PDO::PARAM_STR));
            }
            $stmt->execute();
            return $stmt;
        }
    }
?>