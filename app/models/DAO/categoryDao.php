<?php
require_once(__DIR__ . '/../categoryC.php');

class CategoryDao {
    private $db;
    private categoryC $category;

    public function __construct() {
        $this->db = new Database();
        $this->category = new categoryC();
    }

    public function CategoryCount(){
        try{
            $this->db->query("SELECT COUNT(*) as count FROM categorie");
            $this->db->execute();
            $result = $this->db->single(); // Fetch the result as an object
            return $result->count; 
        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getcategoriesForVisitor()
    {
        try {
            $this->db->query("SELECT * FROM categorie ORDER BY date_C DESC LIMIT 3;
            ");
            $result = $this->db->fetchAll();
            $categories = array();
            foreach ($result as $row) {
                $category = new CategoryC();
                $category->setCategoryID($row->categorie_id);
                $category->setCategoryName($row->nom);
                array_push($categories, $category);
            }
            return $categories;
        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getAllCategories()
    {
        try {
            $this->db->query("SELECT * FROM `categorie`");
            $result = $this->db->fetchAll();
            $categories = array();
            foreach ($result as $row) {
                $category = new CategoryC();
                $category->setCategoryID($row->categorie_id);
                $category->setCategoryName($row->nom);
                array_push($categories, $category);
            }
            return $categories;
        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function AddCategory(categoryC $categorie)
    {
        try {
            $categorie_name = $categorie->getCategoryName();
            $this->db->query("INSERT INTO categorie(nom) VALUES (:name)");
            $this->db->bind(':name', $categorie_name);
            $this->db->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        
        }

    }
 
    public function UpdateCategorie(CategoryC $category)
    {
        try {
            $category_id=$category->getCategoryID();
            $category_name=$category->getCategoryName();
            $this->db->query("UPDATE categorie SET nom = :name, date_C = CURRENT_TIMESTAMP WHERE categorie_id = :id");
            $this->db->bind(":id", $category_id);
            $this->db->bind(":name", $category_name);
            $this->db->execute();
        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function DeleteCategorie(CategoryC $category)
    {
        try {
            $id = $category->getCategoryID();
            $this->db->query("DELETE FROM `categorie` WHERE categorie_id = :id");
            $this->db->bind(':id', $id);
            $this->db->execute();

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

   
    public function getCategory()
    {
        return $this->category;
    }


}