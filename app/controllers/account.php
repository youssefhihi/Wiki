<?php
class account extends Controller
{

  //  private $WikiModel;
    private $UserModel;

    public function __construct(){
       // $this->WikiModel = $this->model('wikiDao');            
        $this->UserModel = $this->model('UserDao');            
                 
    }

    public function index()
    {
        $data = [
            'title' => 'Account',
            'userinfo'=> $this->UserModel->UserAccount(2)
            
            
        ];
        $this->view('pages/AuteurPages/account', $data);
         
    }

    // public function InsertWiki(){
    //     if(isset($_POST['AddWiki'])){
    //         $title= $_POST['titre'];
    //         $text= $_POST['texte'];
    //         $tmp_name = $_FILES['image']['tmp_name'];
    //         $image = file_get_contents($tmp_name);
    //         $categoryID= $_POST['categorie'];
    //         $tags = isset($_POST['tags']) ? $_POST['tags'] : [];
    //         $wiki = new Wiki($title, $text, $image, $categoryID);
    //         $this->WikiModel->AddWiki($wiki, $tags);

    //         }          
    // }
}