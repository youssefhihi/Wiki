<?php
session_start();

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

    

    public function searchAction()
    {
      if(isset($_POST['input'])){
       $searchInput= $_POST['input'] ;
        $searchResults = $this->WikiModel->search($searchInput); 
        // var_dump($searchResults);
      
        return $searchResults;
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