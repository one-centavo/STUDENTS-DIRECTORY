<?php

    namespace App\Controllers;
    use App\Core\View;
    use App\Models\ProgramsModel;

    class ProgramsController {
        private $programsModel;

        public function __construct()
        {
            $this->programsModel = new ProgramsModel();
        }

        public function index() {
            View::render($_GET['views'], [
                'programs' => $this->getPrograms()
            ]);
        }

        public function addProgram(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                header('Content-Type: application/json');

                if(!isset($_POST['program_name']) || empty(trim($_POST['program_name']))){
                    echo json_encode(
                    [
                        'boolean' => false,
                        'response' => 'Rellene todos los campos obligatorios'
                    ]);

                    return;
                    exit;
                }
                $name = trim($_POST['program_name']);
                $params = [
                    'name' => $name
                ];

                if($this->programsModel->addProgram($params)){
                    echo json_encode(
                    [
                        'boolean' => true,
                        'response' => 'Programa agregado exitosamente'
                    ]);
                    exit;
                } else {
                    echo json_encode(
                    [
                        'boolean' => false,
                        'response' => 'Error al agregar el programa'
                    ]);
                    exit;
                }
            }
        }

        protected function getPrograms(){
            return $this->programsModel->getPrograms();
        }

        public function updateProgram(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                header('Content-Type: application/json');

                if(!isset($_POST['program_name']) || empty(trim($_POST['program_name'])) || !isset($_POST['id_program']) || empty(trim($_POST['id_program']))){
                    echo json_encode(
                    [
                        'boolean' => false,
                        'response' => 'Rellene todos los campos obligatorios'
                    ]);

                    return;
                    exit;
                }
                $name = trim($_POST['program_name']);
                $id = trim($_POST['id_program']);
                $params = [
                    'name' => $name,
                    'id' => $id
                ];

                if($this->programsModel->updateProgram($params)){
                    echo json_encode(
                    [
                        'boolean' => true,
                        'response' => 'Programa actualizado exitosamente'
                    ]);
                    exit;
                } else {
                    echo json_encode(
                    [
                        'boolean' => false,
                        'response' => 'Error al actualizar el programa'
                    ]);
                    exit;
                }
            }
        }

        public function deleteProgram($id){
            if($this->programsModel->deleteProgram($id)){
                header('Location: ' . APP_URL . 'programs');
                exit;
            } else {
                header('Location: ' . APP_URL . 'programs');
                exit;
            }
        }
    }