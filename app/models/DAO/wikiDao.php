<?php
require_once(__DIR__ . '/../wiki.php');
require_once(__DIR__ . '/../categoryC.php');
require_once(__DIR__ . '/../User.php');

class WikiDao{

    private $db;
    private Wiki $wiki;

    public function __construct(){
        $this->db = new Database();
        $this->wiki = new Wiki();
    }



    public function getAllWikis(){
        try{
            $this->db->query("SELECT wiki.* ,categorie.nom, user.gmail FROM wiki join categorie ON categorie.categorie_id = wiki.categorieId join user ON user.user_id = wiki.userId Where wiki.status = 0");
            $result= $this->db->fetchAll();
            $wiki = array();
            foreach($result as $row){
                $wiki_data = new wiki();
                $wiki_data->setWikiID($row->id);
                $wiki_data->setTitle($row->titre);
                $wiki_data->setTexte($row->texte);
                $wiki_data->setImageP($row->image);
                $wiki_data->setDate($row->date_post);
                $wiki_data->setStatus($row->status);
                $wiki_data->getAuthor()->setEmail($row->gmail);            
                $wiki_data->getCategorie()->setCategoryName($row->nom);
                array_push($wiki,$wiki_data);
            }     
            return $wiki;
        }
        catch(Exception $e){
            error_log("Error in Archines wiki: " . $e->getMessage());
 
        }
    }
  public function getAutorWikis($id){
    try{
       
    $this->db->query("SELECT wiki.id, wiki.titre, wiki.texte, wiki.image, wiki.date_post, wiki.status,categorie.nom, user.nom ,user.image as imageP FROM wiki join categorie ON categorie.categorie_id = wiki.categorieId join user ON user.user_id = wiki.userId Where user.user_id = :id AND wiki.status = 0;");
    $this->db->bind(":id", $id);
    $result= $this->db->fetchAll();
    $wiki = array();
    foreach($result as $row){
        $wiki_data = new wiki();
        $wiki_data->setWikiID($row->id);
        $wiki_data->setTitle($row->titre);
        $wiki_data->setTexte($row->texte);
        $wiki_data->setImageP($row->image);
        $wiki_data->setDate($row->date_post);
        $wiki_data->setStatus($row->status);
        $wiki_data->getNameAuthor()->setUsername($row->nom);            
        $wiki_data->getCategorie()->setCategoryName($row->nom);
       $wiki_data->getAuthor()->setImage($row->imageP);
        
        array_push($wiki,$wiki_data);
    }     
    return $wiki;
}
catch(Exception $e){
    error_log("Error in Archines wiki: " . $e->getMessage());

}
}


    public function ArchiveWiki(Wiki $wiki){
        try {
       $id= $wiki->getWikiID();
      
        $req="UPDATE `wiki` SET `status`= 1 WHERE id =:id";
        $this->db->query($req);
        $this->db->bind(':id',$id);
        $this->db->execute();
 
        }
        catch(Exception $e){
            error_log("Error in Archines wiki: " . $e->getMessage());
 
        }
    }
    
    public function AddWiki($title, $texte, $image, $categorieID,$id,$tags) {
        try {
           
            $this->db->query("INSERT INTO wiki (`titre`, `texte`, `image`, `categorieID`,userID) VALUES (:titre, :texte, :image, :categorieID,:id)");
            $this->db->bind(':titre', $title);
            $this->db->bind(':texte', $texte);
            $this->db->bind(':image', $image);
            $this->db->bind(':categorieID', $categorieID);
            $this->db->bind(':id', $id);
            $this->db->execute();
            $wikiId =  $this->db->lastInsertId();

            foreach ($tags as $tag) {
                $this->db->query("INSERT INTO wiki_tag (wikiId, tagId) VALUES (:wikiId, :tagId)");
                $this->db->bind(':wikiId', $wikiId);
                $this->db->bind(':tagId', $tag);
                $this->db->execute();
            }
        } catch (Exception $e) {
          echo $e->getMessage();
        }
    }
    
    

 
    public function getWiki()
    {
        return $this->wiki;
    }
}