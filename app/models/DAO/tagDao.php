<?php 
require_once(__DIR__ . '/../tagC.php');
class TagDao{
    private $db;
    private TagC $tags;
    public function __construct() {
        $this->db=new Database();
        $this->tags=new TagC();
    }

    public function TagCount(){
        try{
            $this->db->query("SELECT COUNT(*) as count FROM tag");
            $this->db->execute();
            $result = $this->db->single(); // Fetch the result as an object
            return $result->count; 
        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getAllTags(){
        try {
            $this->db->query("SELECT * FROM `tag`");
            $result = $this->db->fetchAll();
            $tags = array();
            foreach ($result as $row) {
                $tag = new TagC();
                $tag->setTagID($row->tag_id);
                $tag->setTagName($row->nom);
                array_push($tags, $tag);
            }
            return $tags;
        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function AddTag(TagC $tags)
    {
        try {
            $Tags_name = $tags->getTagName();
            $this->db->query("INSERT INTO tag(nom) VALUES (:name)");
            $this->db->bind(':name', $Tags_name);
            $this->db->execute();
        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }

    }

     public function DeleteTags(TagC $tags)
     {
         try {
             $Tags_id = $tags->getTagID();  
             $this->db->query("DELETE FROM `tag` WHERE tag_id = :id");
             $this->db->bind(":id", $Tags_id);
             $this->db->execute();
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
     }

    public function UpdateTags(TagC $tags){
        try {
            $Tags_id = $tags->getTagID(); 
            $tags_name =$tags->getTagName(); 
            $this->db->query("UPDATE `tag` SET nom=:name WHERE tag_id = :id");
            $this->db->bind(":id", $Tags_id);
            $this->db->bind(":name", $tags_name); 
            $this->db->execute();
        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function getTags()
    {
        return $this->tags;
    }
}