<?php
require_once(__DIR__ . '/../User.php');

class UserDao {
    private $db;
    private User $user;

    public function __construct() {
        $this->db = new Database();
        $this->user = new User();
    }



    public function UsersCount(){
        try {
            $this->db->query("SELECT COUNT(*) as count FROM user");
            $this->db->execute();
            $result = $this->db->single(); // Fetch the result as an object
            return $result->count; // Access the count property of the object
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function imageProfile($id, $image){
        try{
            $this->db->query("UPDATE user SET image = :image WHERE user_id = :id");
            $this->db->bind(":id", $id);
            $this->db->bind(":image", $image);
            $this->db->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function UserAccount($id)
    {
        try {
             
            $this->db->query("SELECT * FROM user WHERE user_id = :id");
            $this->db->bind(":id", $id);
            $this->db->execute();
            $userData = $this->db->fetchAll(PDO::FETCH_ASSOC);
            $user = array();
            foreach ($userData as $row) {
                $data = new User();
                $data->setUser_Id($row->user_id);
                $data->setUsername($row->nom);
                $data->setEmail($row->gmail);
                $data->setDate($row->date);
                $data->setImage($row->image);
                array_push($user, $data);
            }
            return $user;
           
    
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function findUserByEmail($email) {
        try {
            $this->db->query("SELECT * FROM user WHERE gmail = :email");
            $this->db->bind(":email", $email);
            $this->db->execute();
           $result =  $this->db->single(PDO::FETCH_ASSOC);
            
            if (count($result) > 0) {
                return $result;
            }
            
            return false;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    

    public function signup($name, $email, $pass){
        try{
       $this->db->query("INSERT INTO user (`nom`, `gmail`, `password`, `role`,`image`)
        VALUES (:name, :email, :password, 1,:image)");
        $image =  file_get_contents('../public/image/profile.jpg');
        $this->db->bind(":name", $name);     
        $this->db->bind(":email", $email);
        $this->db->bind(":password", $pass);
        $this->db->bind(":image", $image);
        $this->db->execute();
        return true;
        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


   
    
    

    public function login($email)
    {
        try {
            $this->db->query("SELECT * FROM user WHERE gmail = :email");
            $this->db->bind(":email", $email);
            $userData = $this->db->single(PDO::FETCH_ASSOC);
                    $user = new User();
                    $user->setUser_id($userData->user_id);
                    $user->setUsername($userData->nom);
                    $user->setEmail($userData->gmail);
                    $user->setPassword($userData->password);
                    $user->setRole($userData->role);     
                return $user;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }
    
    
    

    


    public function getUser(){
        return $this->user;
    }

}