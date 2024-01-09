<?php




class User {
    private $user_id;
    private $username;
    private $email;
    private $password;
    private $role;


    public function __construct($user_id = null ,$username=null, $email = null , $password = null , $role = null ) {
        $this->user_id = $user_id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
     
        
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
}
 

 