<?php
session_start();

  class Pages extends Controller {
    private $WikiModel;
    public function __construct(){
      $this->WikiModel = $this->model('WikiDao');  

     
    }
    
    public function index(){
      $data = [
        'title' => 'Wiki',
        'wikis' => $this->WikiModel->getWikisForVisitor()
      ];
     
      $this->view('pages/AuteurPages/home', $data);
    }

  
  
  }