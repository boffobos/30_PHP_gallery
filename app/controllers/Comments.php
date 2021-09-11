<?php
    class Comments extends Controller {
        public function __construct(){
            if(!isLoggedIn()){
                redirect('users/login');
            }

            $this->commentModel = $this->model('Comment');
            $this->userModel = $this->model('User');
        }

        public function index() {
            $comments = $this->commentModel->getComments();

            $data = [
                'comments' => $comments
            ];


            $this->view('comments/index', $data);
        }

        public function add(){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'user_id' => $_SESSION['user_id'],
                    'title_err' => '',
                    'body_err' => ''
                ];

                //Validate title
                if(empty($data['title'])){
                    $data['title_err'] = 'Please enter title';
                }
                if(empty($data['body'])){
                    $data['body_err'] = 'Please enter body text';
                }

                //Make sure no errors
                if(empty($data['title_err']) && empty($data['body_err'])){
                    //VAlidated
                    if($this->commentModel->addComment($data)){
                        flash('comment_message', 'Comment Added');
                        redirect('comments');
                    } else {
                        die('something went wrong');
                    }
                } else {
                    //Load view with errors
                    $this->view('comments/add', $data);
                }
            } else {
                $data = [
                    'title' => '',
                    'body' => ''
                ];
    
                $this->view('comments/add', $data); 
            }

            
        }

        public function edit($id){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'user_id' => $_SESSION['user_id'],
                    'id' => $id,
                    'title_err' => '',
                    'body_err' => ''
                ];

                //Validate title
                if(empty($data['title'])){
                    $data['title_err'] = 'Please enter title';
                }
                if(empty($data['body'])){
                    $data['body_err'] = 'Please enter body text';
                }

                //Make sure no errors
                if(empty($data['title_err']) && empty($data['body_err'])){
                    //VAlidated
                    if($this->commentModel->updateComment($data)){
                        flash('comment_message', 'Comment Updated');
                        redirect('comments');
                    } else {
                        die('something went wrong');
                    }
                } else {
                    //Load view with errors
                    $this->view('comments/edit', $data);
                }
            } else {
                // Get existing comment from model
                $comment = $this->commentModel->getCommentById($id);

                // Check for owner
                if($comment->user_id != $_SESSION['user_id']){
                    redirect('comments');
                }
                $data = [
                    'id' => $id,
                    'title' => $comment->title,
                    'body' => $comment->body
                ];
    
                $this->view('comments/edit', $data); 
            }

            
        }

        public function show($id){
            $comment = $this->commentModel->getCommentById($id);
            $user = $this->userModel->getUserById($comment->user_id);

            $data = [
                'comment' => $comment,
                'user' => $user
            ];
            $this->view('comments/show', $data);
        }

        public function delete($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Get existing comment from model
                $comment = $this->commentModel->getCommentById($id);

                // Check for owner
                if($comment->user_id != $_SESSION['user_id']){
                    redirect('comments');
                }

                if($this->commentModel->deleteComment($id)){
                    flash('comment_message', 'Comment removed');
                    redirect('comments');
                } else {
                    die('something went wrong');
                }
            } else {
                redirect('comments');
            }
        }
    }