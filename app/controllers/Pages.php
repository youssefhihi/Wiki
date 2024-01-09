<?php
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