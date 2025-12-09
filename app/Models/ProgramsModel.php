<?php

    namespace App\Models;
    use App\Core\Database;

    class ProgramsModel{
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        public function addProgram($params){
            $sql = "INSERT INTO programs (program_name) VALUES (:name)";
            return $this->db->query($sql, $params);
        }

        public function getPrograms(){
            $sql = "SELECT * FROM programs";
            return $this->db->query($sql);
        }

        
    }

    