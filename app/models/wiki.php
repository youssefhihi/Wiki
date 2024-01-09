<?php 
class Wiki{
    // `wikiID`, `title`, `Texte`, `image`, `dateCreated`, `status`, `ID_author`, `ID_Categorie`
    private $wikiID;
    private $title;
    private $Texte;
    private $image;
    private $dateCreated;
    private $status;
    private $Email;
    private $categorieID;
    private CategoryC $categorie;
    private User $Author;
    public function __construct(){
        $this->Author=new User();
        $this->categorie=new CategoryC();
    }
    
    
    


    public function getWikiID()
    {
        return $this->wikiID;
    }

    
    public function setWikiID($wikiID)
    {
        $this->wikiID = $wikiID;

        return $this;
    }

 
    public function getTitle()
    {
        return $this->title;
    }

    
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function getTexte()
    {
        return $this->Texte;
    }

 
    public function setTexte($Texte)
    {
        $this->Texte = $Texte;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

   
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }


    public function getDate()
    {
        return $this->dateCreated;
    }

  
    public function setDate($dateCreated)
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

 
    public function getStatus()
    {
        return $this->status;
    }

   
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    public function getCategorie()
    {
        return $this->categorie;
    }
    public function getCategorieID()
    {
        return $this->categorieID;
    }

   

    public function getNameAuthor()
    {
        return $this->Author;
    }
    public function getEmailAuthor()
    {
        return $this->Email;
    }
}