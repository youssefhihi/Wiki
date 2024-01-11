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

    

  //   public function searchAction()
  //   {
  //       // Retrieve the search term from the query string
  //       $searchTerm = $_GET['q'] ?? '';
        

  //       $searchResults = $this->WikiModel->search($searchTerm);

  //       // Return search results as JSON
  //       header('Content-Type: application/json');
  //       echo json_encode($searchResults);
  //       exit;
  //   }
    public function wikipage()
{
    if (isset($_POST['page'])) {
        $wikiID = $_POST["idWikiPage"];
        $wiki = new wiki();
        $wiki->setWikiID($wikiID);
        $res = $this->WikiModel->wikiPage($wiki);     
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