<?php
session_start();
 $id = $_SESSION['idUser'];
class Dashboard extends Controller
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
            'title' => 'dashboard',
            'UserCount' => $this->UserModel->UsersCount(),
            'CategoryCount' => $this->CategoryModel->CategoryCount(),
            'TagCount' => $this->TagModel->TagCount()
            
        ];
        $this->view('pages/AdminPages/dashboard', $data);
         
    }
    public function Category()
    {
        $data = [
            'title' => 'Category',
            'category' => $this->CategoryModel->getAllCategories(),
        ];
        $this->view('pages/AdminPages/category', $data);
         
    }
    public function Tag()
    {
        $data = [
            'title' => 'Tag',
            'Tag' => $this->TagModel->getAllTags(),
        ];
        $this->view('pages/AdminPages/Tag', $data);
         
    }
    public function Wiki()
    {
        $data = [
            'title' => 'Wiki',
            'Wiki' => $this->WikiModel->getAllWikis(),
        ];
        $this->view('pages/AdminPages/Wiki', $data);
         
    }
   
    public function InsertCategory(){
        if(isset($_POST['AddCategory'])){
            $nameCategory = $_POST['name'];
            $errorCategory = array();
            $patternName = '/^[a-zA-Z\s\'.-]+$/';
            if(!preg_match($patternName,$nameCategory)){                             
                array_push($errorCategory, "please write name valid for Category");
            }else{
                $Category = new CategoryC();
                $Category->setCategoryName($nameCategory );
                $this->CategoryModel->AddCategory($Category);
                header('Location: ' . URLROOT . '/Dashboard/category');
            }            
                    
            }else {
                header('Location: ' . URLROOT . '/Dashboard/category');
            }          
    }
    public function DeleteCategory(){
        if (isset($_POST['DeleteCategory'])){
            $id = $_POST['idCategory'];
            $Category = new CategoryC();
            $Category->setCategoryID($id);
            $this->CategoryModel->DeleteCategorie($Category);         
            header('Location: ' . URLROOT . '/Dashboard/category');
        }else{
            header('Location: ' . URLROOT . '/Dashboard/category');
        }
    }

public function UpdateCategory(){
    if(isset($_POST['UpdateCategory'])){
        $name = $_POST['name'];
        $id = $_POST['idCategory'];
        $Category = new CategoryC();
        $Category->setCategoryID($id);
        $Category->setCategoryName($name);
        $this->CategoryModel->UpdateCategorie($Category);         
        header('Location: ' . URLROOT . '/Dashboard/category');
    }else{
        header('Location: ' . URLROOT . '/Dashboard/category');
    }
}

    public function InsertTag(){
        if(isset($_POST['AddTag'])){
            $nameTag = $_POST['name'];
            $tag = new tagC();
            $tag->setTagName($nameTag);
            $this->TagModel->AddTag($tag);
            header('Location: ' . URLROOT . '/Dashboard/Tag');
        }else{
            header('Location: ' . URLROOT . '/Dashboard/Tag');
        }
    }

    public function DeleteTag(){
        if (isset($_POST['DeleteTag'])){
            $id = $_POST['idTag'];
            $Tag = new TagC();
            $Tag->setTagID($id);
            $this->TagModel->DeleteTags($Tag);         
            header('Location: ' . URLROOT . '/Dashboard/Tag');
        }else{
            header('Location: ' . URLROOT . '/Dashboard/Tag');
        }
    }
    public function UpdateTag(){
        if(isset($_POST['UpdateTag'])){
            $name = $_POST['name'];
            $id = $_POST['idTag'];
            $Tag = new TagC();
            $Tag->setTagID($id);
            $Tag->setTagName($name);
            $this->TagModel->UpdateTags($Tag);         
            header('Location: ' . URLROOT . '/Dashboard/Tag');
        }else{
            header('Location: ' . URLROOT . '/Dashboard/Tag');
        }
    }
}