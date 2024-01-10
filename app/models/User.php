<?php




class User {
    private $user_id;
    private $username;
    private $email;
    private $password;
    private $role;
    private $Image;
    private $Date;
 
    public function __construct($user_id = null ,$username=null, $email = null , $password = null ,$role =null, $Date= null , $Image = null) {
        $this->user_id = $user_id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role =$role;
        $this->Date = $Date;
        $this->Image = $Image;
        
    }
    /**
     * Get the value of user_id
     */ 
    public function getUser_id()
    {
        return $this->user_id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getRole() {
        return $this->role;
    }   
    
  
     function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

 
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }


    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }
    public function getImage()
    {
        return $this->Image;
    }

    public function setImage($Image)
    {
        $this->Image = $Image;

        return $this;
    }
    public function getDate()
    {
        return $this->Date;
    }

    public function setDate($Date)
    {
        $this->Date = $Date;

        return $this;
    }
}
 

 