<?php 
    class Images extends Controller {
        public function __construct(){

            $this->imageModel = $this->model('Image');
            $this->userModel = $this->model('User');
            $this->commentModel = $this->model('Comment');

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
                
                        $filePath = ROOT_DIR . UPLOAD_DIR . basename($fileName);
                
                        if (!move_uploaded_file($_FILES['files']['tmp_name'][$i], $filePath)) {
                            $data['errors'][] = 'Uploading error ' . $fileName;
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
                    flash ('upload_success', 'Files uploaded succesfully');
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
            $comments = $this->commentModel->getCommentsByImageId($id);

            $data = [
                'image' => $image,
                'user' => $user,
                'comments' => $comments,
            ];

            $this->view('images/show', $data);
        }

        public function delete($id){
            $image = $this->imageModel->getImageById($id);
            if($_SERVER['REQUEST_METHOD'] === 'POST'){

                //Check for owner
                if($image->user_id != $_SESSION['user_id']){
                    redirect('images/show/' . $id);
                } else {
                    if(unlink($image->path)) {
                        if($this->imageModel->deleteImage($id)){
                        flash('comment_message', 'Image removed');
                        redirect('pages/index/');
                        } else {
                            die('image entry has not been erased from data base');
                        }
                        
                    } else {
                        die('image file has not been deleted from dist');
                    }
                }    
            } else {
                redirect('images/show/' . $id);
            }
        }
    }