<?php
session_start();
if(isset($_SESSION['roleAdmin'])){
  header("location:" . URLROOT . "/Dashboard" );
}
  class Pages extends Controller {
    private $WikiModel;
    private $CategoryModel;
    public function __construct(){
      $this->WikiModel = $this->model('WikiDao');  
      $this->CategoryModel = $this->model('CategoryDao');  

     
    }
    
    public function index(){
      $data = [
        'title' => 'Wiki',
        'wikis' => $this->WikiModel->getWikisForVisitor(),
        'lastcategory' => $this->CategoryModel->getcategoriesForVisitor(),
      
      ];
     
      $this->view('pages/AuteurPages/home', $data);
    }

  

  public function searchAction() {
      header('Content-Type: application/json');
      
      $data = file_get_contents('php://input');
      $decodedData = json_decode($data, true);
      
      if ($decodedData !== null) {
          $searchInput = (string) $decodedData['input'];
          $searchResults = $this->WikiModel->search($searchInput);
          
         
          
      
        $r = array();
        foreach ($searchResults as $key => $value) {
            $r[] = get_object_vars($value);
        }

        
        $cleanedResults = array_map(function ($item) {
            return array_map(function ($value) {
                return is_string($value) ? mb_convert_encoding($value, 'UTF-8', 'UTF-8') : $value;
            }, $item);
        }, $r);

       
        
        $jsonEncoded = json_encode($cleanedResults);
        
        if ($jsonEncoded === false) {
          
            echo json_encode(['error' => 'JSON encoding error: ' . json_last_error_msg()]);
        } else {
            
            echo $jsonEncoded;
        }
        
          
          exit;
      } else {
          echo json_encode(['error' => 'Invalid JSON format']);
      }
  }


    public function wikipage()
  {
    if (isset($_POST['page'])) {
        $wikiID = $_POST["idWikiPage"];       
        $res = $this->WikiModel->wikiPage($wikiID);     
        if ($res) {
          $data = [
            'title' => 'WikiPage',
            'oneWiki' => $res
            
          ];
          $this->view('pages/AuteurPages/wikiPage', $data);
            exit(); 
          }

    }
}

  
   }