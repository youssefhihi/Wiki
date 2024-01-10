<?php
session_start();
class Register extends Controller
{

    private $UserModel;
    public function __construct(){
        $this->UserModel = $this->model('UserDao');            
    }

    public function index(){
        $data = [
            'title' => 'register',
            
        ];
    
        $this->view('pages/AuteurPages/register', $data);
    }
    
    public function signupA()
    {
        if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirmPassword"])) {
            $fullName = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $repeat_password = $_POST["confirmPassword"];
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $errors = array();
            $patternEmail = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
            $patternName = '/^[a-zA-Z\s\'.-]+$/';
            $patternPassword = '/^(?=.*[0-9])(?!.*[^0-9a-zA-Z-_@])[a-zA-Z0-9-_@]{8,}$/';
    
            if (!preg_match($patternName, $fullName)) {
                array_push($errors, "Name is not valid.");
              
            }
    
            if (!preg_match($patternEmail, $email)) {
                array_push($errors, "Email is not valid.");
            }
    
            if (!preg_match($patternPassword, $password)) {
                array_push($errors, "Please use at least 8 characters");
            }
    
            if ($password !== $repeat_password) {
                array_push($errors, "The password does not match");
            }
    
            if (count($errors) > 0) {
                 $_SESSION['error'] =  $errors;
                     
            } else {
                $Result = $this->UserModel->signup($fullName, $email, $password_hash);
                if ($Result) {
                   header('location:' .URLROOT. '/Register');                 
                }
            }
        }else{
            header('location:' .URLROOT. '/Register'); 
        }
    }
    



    public function loginA(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          if(isset( $_POST["email"]) && isset($_POST["password"])){
            $patternEmail = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
                    $patternPassword = '/^(?=.*[0-9])(?!.*[^0-9a-zA-Z-_@])[a-zA-Z0-9-_@]{8,}$/';
                    $errorsL = array();
            
                    if (!preg_match($patternEmail, $_POST["email"])) {
                        array_push($errorsL, "Email is not valid.");
                    }
            
                    if (!preg_match($patternPassword, $_POST["password"])) {
                        array_push($errorsL, "Please use at least 8 characters");
                    }
            
                    if (count($errorsL) > 0) {
                        $data = ['error' => $errorsL];
                        $this->view('pages/AuteurPages/register', $data);
                        exit();
                    }
            $userfound= $this->UserModel->login($_POST["email"]);
            if($userfound){
                
              if(password_verify($_POST["password"],$userfound->getPassword())){
             $_SESSION['idUseer'] = $userfound->getUser_id();
                if ($userfound->getrole() == 0) {
                    header("location:" . URLROOT . "/dashboard");
                    exit();  
                } else if ($userfound->getrole() == 1) {
                    header("location:" . URLROOT );
                    exit();  
                } else {
                    echo "doesn't exist";
                }
              }else{
                $Err = "Password Incorrect";
                $data = ['error' => $Err];
                $this->view('pages/AuteurPages/register', $data);
              }
            }else{
              $Err = "User not found";
              $data = ['error' => $Err];
              $this->view('pages/AuteurPages/register', $data);
            }
          }else{
            $Err = "please write your email and correct password!";
            $data = ['error' => $Err];
            $this->view('pages/AuteurPages/register', $data);
          }
        }else{
            $this->view('pages/AuteurPages/register');
        }
      }

          
                    
 
                    
    
    }
    

