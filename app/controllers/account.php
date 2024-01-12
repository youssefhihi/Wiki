<?php
session_start();
$id = $_SESSION['idUseer'];
class account extends Controller
{

   
    private $CategoryModel;
    private $TagModel;
    private $UserModel;
    private $WikiModel;
    public function __construct(){
        $this->TagModel = $this->model('tagDao');            
        $this->CategoryModel = $this->model('categoryDao');            
        $this->UserModel = $this->model('UserDao');            
        $this->WikiModel = $this->model('WikiDao');            
    }

    public function index()
    {
        $data = [
            'title' => 'Account',
            'userinfo'=> $this->UserModel->UserAccount($_SESSION['idUseer']),
            'tag' => $this->TagModel->getAllTags(),
            'category' => $this->CategoryModel->getAllCategories(),
            'wiki' => $this->WikiModel->getAutorWikis($_SESSION['idUseer'])
        
            
        ];
        $this->view('pages/AuteurPages/account', $data);
         
    }

 


    public function InsertWiki(){
        if(isset($_POST['AddWiki'])){
            if (isset($_POST['titre']) && isset($_POST['iduseer']) && isset($_POST['texte']) && isset($_FILES['image']) && isset($_POST['categorie']) && isset($_POST['tags'])) {
                $title = $_POST['titre'];
                $id = $_POST['iduseer'];
                $text = $_POST['texte'];
                $image = $_FILES['image'];
                $tmp_name = $_FILES['image']['tmp_name'];
                $image = file_get_contents($tmp_name);   
                $categoryID = $_POST['categorie'];
                $tags = isset($_POST['tags']) ? $_POST['tags'] : [];
                
                $this->WikiModel->AddWiki($title, $text, $image, $categoryID, $id, $tags);
            } else {  
                $empty = "You have an empty column, please fill in all required fields.";
                $data = ['empty' => $empty];
                $this->view('pages/AuteurPages/account', $data);
                
            }
    
            header("location:" . URLROOT . "/account");
        }
        header("location:" . URLROOT . "/account");

    }
    
    
  

    public function ImageProfile(){
        if(isset($_POST['UpdateImage'])){
          
                $id = $_SESSION['idUseer'];
                $image = $_FILES['image'];
                $tmp_name = $_FILES['image']['tmp_name'];
                $image = file_get_contents($tmp_name);    
                $success = $this->UserModel->imageProfile($id, $image);   
                if ($success) {
                  header("location:" . URLROOT . "/account");
                } else {
                header("location:" . URLROOT . "/account");
                }
           
        
    }
    
    }

    // Controller method for handling wiki update
public function UpdateWiki() {
    if (isset($_POST['UpdateWiki'])) {
        // Get the form data
        $wikiId = $_POST['wikiID'];
        $title = $_POST['titre'];
        $texte = $_POST['texte'];
        $image = $_FILES['image'];
         $tmp_name = $_FILES['image']['tmp_name'];
        $image = file_get_contents($tmp_name);    // Assuming you're uploading an image
        $categorieID = $_POST['categorie'];
        $tags = isset($_POST['tags']) ? $_POST['tags'] : [];

        $this->WikiModel->UpdateWiki($wikiId, $title, $texte, $image, $categorieID, $tags);
      
    } header("location:" . URLROOT . "/account");

header("location:" . URLROOT . "/account");
}

public function DeleteWiki()
{
    if(isset($_POST['DeleteWiki'])){
        $wikiID = $_POST['idWiki'];
        $wiki = new wiki;
        $wiki->setWikiID($wikiID);  
        $this->WikiModel->DeleteWiki($wiki);
        header("location:" . URLROOT . "/account");
    }
    header("location:" . URLROOT . "/account");
}

    
    
    
    
}