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

        public function updateProgram($params){
            $sql = "UPDATE programs SET program_name = :name WHERE id_program = :id";
            return $this->db->query($sql, $params);
        }

        public function deleteProgram($id){
            $sql = "DELETE FROM programs WHERE id_program = :id";
            $params = [
                'id' => $id
            ];
            return $this->db->query($sql, $params);
        }

        
    }

    