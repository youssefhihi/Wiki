<?php 
class CategoryC{
    
    private $categoryID;
    private $categoryName;
    public function __construct($categoryName = null ,$categoryID = null ){
        $this->categoryName  = $categoryName ;
        $this->categoryID  = $categoryID ;
    }
  
    public function getCategoryID()
    {
        return $this->categoryID;
    }

  
    public function setCategoryID($categoryID)
    {
        $this->categoryID = $categoryID;

        return $this;
    }

     
    public function getCategoryName()
   
    {
        return $this->categoryName;
    }

  
    public function setCategoryName($categoryName)
    {
        $this->categoryName = $categoryName;

        return $this;
    }
}