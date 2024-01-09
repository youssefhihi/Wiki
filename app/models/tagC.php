<?php 
class TagC{

    private $tagID;
    private $tagName;
    public function __construct($tagName = null ,$tagID = null ){
        $this->tagName  = $tagName ;
        $this->tagID  = $tagID ;
    }
  
    


    public function getTagID()
    {
        return $this->tagID;
    }

 
    public function setTagID($tagID)
    {
        $this->tagID = $tagID;

        return $this;
    }

   
    public function getTagName()
    {
        return $this->tagName;
    }

   
    public function setTagName($tagName)
    {
        $this->tagName = $tagName;

        return $this;
    }
}