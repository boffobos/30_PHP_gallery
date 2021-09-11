<?php
  class Pages extends Controller {
    public function __construct(){
      $this->imageModel = $this->model('Image');
      $this->commentModel = $this->model('Comment');
    }
    
    public function index(){
      $images = $this->imageModel->loadAll();
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