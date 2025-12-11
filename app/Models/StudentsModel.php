<?php

    namespace App\Models;
    use App\Core\Database;

    class StudentsModel{
        private $db;
        public function __construct(){
            $this->db = new Database();
        }

        public function getAllStudents(){
            $query = $this->db->query("SELECT * FROM students");
            return $query->fetchAll();
        }

        public function addStudent($params){
            $sql = "INSERT INTO students (document, name, last_name, email,url_image,id_program) VALUES (:document, :name, :lastname, :email, :url_image, :id_program)";
            return $this->db->query($sql, $params);
        }
    }