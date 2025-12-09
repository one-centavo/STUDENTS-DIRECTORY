<?php

    namespace App\Core;
    use PDO;
    use PDOException;
    if(file_exists(__DIR__.'/../../config/server.php')){
        require_once __DIR__.'/../../config/server.php';
    }

    class Database{
        private $server = DB_SERVER;
        private $username = DB_USER;
        private $pass = DB_PASS;
        private $db = DB_NAME;
        protected function connection(){
            $config = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            $dns = "mysql:host=$this->server;dbname=$this->db;charset=utf8mb4";
            try{
                $pdo = new PDO($dns, $this->username, $this->pass, $config);
                return $pdo;
            }catch(PDOException $e){
                die("Connection failed: " . $e->getMessage() . " in the line " . $e->getLine() . " of the file " . $e->getFile());
            }
        }

        public function query($sql, $data = []){
            
            try{
                $stmt = $this->connection()->prepare($sql);
                $stmt->execute($data);
                return $stmt;
            }catch(PDOException $e){
                die("Query failed: " . $e->getMessage() . " in the line " . $e->getLine() . " of the file " . $e->getFile());
            }
           
        }
    }