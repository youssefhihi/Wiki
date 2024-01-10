<?php
session_start();
$id = $_SESSION['idUseer'];
  class Pages extends Controller {
    public function __construct(){
     
    }
    
    public function index(){
      $data = [
        'title' => 'Wiki',
      ];
     
      $this->view('pages/AuteurPages/home', $data);
    }

  
  
  }