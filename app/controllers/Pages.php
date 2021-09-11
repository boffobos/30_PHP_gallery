<?php
  class Pages extends Controller {
    public function __construct(){
      $this->imageModel = $this->model('Image');
      $this->commentModel = $this->model('Comment');
    }
    
    public function index(){
      $images = $this->imageModel->loadAll();
      $comments = $this->commentModel->getComments();

      //adding last comment to image object
      foreach($images as $image){
        foreach($comments as $comment){
          if($image->id === $comment->refered_to){
            $image->last_comment = $comment->body;
            $image->last_comment_date = (new DateTime($comment->created_at))->format('d-m-Y');
            break;
          } 
        }
        if(!isset($image->last_comment)){
          $image->last_comment = '';
          $image->last_comment_date = '';
        }
      }

      $data = [
        'title' => 'Shared images',
        'description' => 'Simple application to share images. Register and then you will be able to add images simple and receive comment from other users',
        'images' => $images,
      ];
     
      $this->view('pages/index', $data);
    }

    public function about(){
      $data = [
        'title' => 'About Us',
        'description' => APPDESCRIPTION,
      ];

      $this->view('pages/about', $data);
    }
  }