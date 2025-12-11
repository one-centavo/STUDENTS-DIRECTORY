<?php 

    namespace App\Controllers;
    use App\Models\StudentsModel;
    use App\Core\View;
    use App\Controllers\ProgramsController;

    class StudentsController{
        private $studentsModel;
        private $programsController;

        public function __construct(){
            $this->studentsModel = new StudentsModel();
            $this->programsController = new ProgramsController();
        }

        public function index(){
            View::render($_GET['views'],[
                'students' => $this->getAllStudents(),
                'programs' => $this->programsController->getPrograms()
            ]);

        }

        protected function getAllStudents(){
            return $this->studentsModel->getAllStudents();
        }

        public function addStudent(){
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                header('Content-Type: application/json');

                if(!isset($_POST['student_document']) || empty(trim($_POST['student_document'])) ||
                   !isset($_POST['student_name']) || empty(trim($_POST['student_name'])) ||
                   !isset($_POST['student_lastname']) || empty(trim($_POST['student_lastname'])) ||
                   !isset($_POST['student_email']) || empty(trim($_POST['student_email'])) ||
                   !isset($_POST['program_id']) || empty(trim($_POST['program_id'])) || 
                   !isset($_FILES['url_image']) || empty($_FILES['url_image']['name'])){
                    
                    echo json_encode(
                    [
                        'boolean' => false,
                        'response' => 'Rellene todos los campos obligatorios'
                    ]);

                    return;
                    exit;
                }

                $document = trim($_POST['student_document']);
                $name = trim($_POST['student_name']);
                $lastname = trim($_POST['student_lastname']);
                $email = trim($_POST['student_email']);
                $id_program = trim($_POST['program_id']);
                $url_image = $_FILES['url_image'];
                $url_image = $this->uploadImage($url_image);

                $params = [
                    'document' => $document,
                    'name' => $name,
                    'lastname' => $lastname,
                    'email' => $email,
                    'url_image' => $url_image,
                    'id_program' => $id_program
                ];

                if($this->studentsModel->addStudent($params)){
                    echo json_encode(
                    [
                        'boolean' => true,
                        'response' => 'Estudiante agregado exitosamente'
                    ]);
                    exit;
                } else {
                    echo json_encode(
                    [
                        'boolean' => false,
                        'response' => 'Error al agregar el estudiante'
                    ]);
                    exit;
                }
            }
        }

        protected function uploadImage($file){
            $allowedMimes = ['image/jpeg', 'image/png', 'image/jpg'];
            $fileMime = mime_content_type($file['tmp_name']);

            if(!in_array($fileMime, $allowedMimes)){
                echo json_encode([
                    'boolean' => false,
                    'response' => 'Tipo de archivo no permitido'
                ]);
                exit; 
            }

        if($file['size'] > 1048576){
            echo json_encode([
                'boolean' => false,
                'response' => 'El tamaño del archivo excede el límite permitido'
            ]);
            exit;
        }

        $uploadDir = BASE_PATH . '/public/upload/';

        if(!file_exists($uploadDir)){
            if(!mkdir($uploadDir, 0777)){
                echo json_encode([
                    'boolean' => false,
                    'response' => 'Error al crear el directorio de subida'
                ]);
                exit;
            }
            chmod($uploadDir, 0777); 
        }


        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    
    
        $uniqueName = uniqid('img_') . '.' . $extension;
    
    
        $destination = $uploadDir . $uniqueName;


        if(!move_uploaded_file($file['tmp_name'], $destination)){
            echo json_encode([
                'boolean' => false,
                'response' => 'Error al subir el archivo'
            ]);
            exit;
        }

        return $uniqueName; 
}
    }