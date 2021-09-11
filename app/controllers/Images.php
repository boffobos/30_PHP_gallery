<?php 
    class Images extends Controller {
        public function __construct(){

            $this->imageModel = $this->model('Image');
            $this->userModel = $this->model('User');

        }

        public function upload(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data = [
                    'errors' => [],
                    'max_size' => MAX_FILE_SIZE,
                    'file_types' => ALLOWED_FILE_TYPES,
                ];
 
                if (!empty($_FILES)) {
                
                    for ($i = 0; $i < count($_FILES['files']['name']); $i++) {
                
                        $fileName = $_FILES['files']['name'][$i];
                
                        if ($_FILES['files']['size'][$i] > MAX_FILE_SIZE) {
                            $data['errors'][] = 'File exites size limit ' . $fileName;
                            continue;
                        }
                
                        if (!in_array($_FILES['files']['type'][$i], ALLOWED_FILE_TYPES)) {
                            $data['errors'][] = 'Wrong file type ' . $fileName;
                            continue;
                        }
                
                        $filePath = UPLOAD_DIR . basename($fileName);
                
                        if (!move_uploaded_file($_FILES['files']['tmp_name'][$i], $filePath)) {
                            $data['errors'][] = 'Uloading error ' . $fileName;
                            continue;
                        }
                        $data[$i] = [
                            'name' => $fileName,
                            'type' => $_FILES['files']['type'][$i],
                            'path' => $filePath,
                            'user_id' => $_SESSION['user_id'],
                        ];
                        
                    }
                    $this->imageModel->upload($data);
                }

                $this->view('images/upload', $data);

            } else {
                $data = [
                    'max_size' => MAX_FILE_SIZE,
                    'file_types' => ALLOWED_FILE_TYPES,
                ];
                //load view
                $this->view('images/upload', $data);
            }
        }

        public function show($id){
            $image = $this->imageModel->getImageById($id);
            $user = $this->userModel->getUserById($image->user_id);

            $data = [
                'image' => $image,
                'user' => $user,
            ];

            $this->view('images/show', $data);
        }
    }