<?php

class Register extends Controller
{

    private $UserModel;
    public function __construct(){
        $this->UserModel = $this->model('UserDao');            
    }
    
    public function index()
    {
        $data = [
            'title' => 'Register',
        ];
    
        $this->view('pages/AuteurPages/Register', $data);
         
        }
      
        
    //     public function signup2(){
          
    //         if (isset($_POST["signup"])) {
    //             $fullName = $_POST["username"];
    //             $email = $_POST["email"];
    //             $role = $_POST["role"];
    //             $password = $_POST["password"];
    //             $repeat_password = $_POST["confirmPassword"];
    
    //             $password_hash = password_hash($confirmPassword, PASSWORD_DEFAULT);
    //             $errors = array();
    //             $patternEmail = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    //             $patternName = '/^[a-zA-Z\s\'.-]+$/';
    //             $patternPassword = '/^.{4,}$/';
    
    //             if (!preg_match($patternName, $fullName)) {
    //                 array_push($errors, "Name is not valid.");
    //             }
    
    //             if (!preg_match($patternEmail, $email)) {
    //                 array_push($errors, "Email is not valid.");
    //             }
    
    //             if (!preg_match($patternPassword, $password)) {
    //                 array_push($errors, "Please use at least 4 characters");
    //             }
    
    //             if ($password !== $repeat_password) {
    //                 array_push($errors, "The password does not match");
    //             }
    
    //             if (count($errors) > 0) {
    
    //                 foreach ($errors as $error) {
    //                     echo '<div class="bg-red-500 rounded-xl text-white p-2 my-2">' . $error . '</div>';
                   
    //                 }
                    
             
    //             } else {
    
    //                 $result = $this->UserModel->signup($fullName, $email, $password_hash, $role);
    
    //                 // Handle the result
    
    
    //                 if ($result) {
    //                     // Registration successful, you can redirect or display a success message
    //                     echo '<div class="bg-green-500 rounded-xl text-white p-2 my-2">Registration successful!</div>';
    //                 } else {
    //                     // Registration failed, handle accordingly
    //                     echo '<div class="bg-red-500 rounded-xl text-white p-2 my-2">Registration failed. Please try again.</div>';
    //                 }
    //             }
    //         }
    
    //         $this->view('pages/registration/register');
    //     }
    //     public function login2()
    //     {
    //         if (isset($_POST["login"])) {
    //             $email = $_POST["email"];
    //             $password = $_POST["password"];
    
    //             $patternEmail = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    //             $patternPassword = '/^.{4,}$/';
    //             $errors = array();
    
    //             if (!preg_match($patternEmail, $email)) {
    //                 array_push($errors, "Email is not valid.");
    //             }
    
    //             if (!preg_match($patternPassword, $password)) {
    //                 array_push($errors, "Please use at least 4 characters");
    //             }
    
    //             if (count($errors) > 0) {
    //                 foreach ($errors as $error) {
    //                     echo '<div class="bg-red-500 rounded-xl text-white p-2 my-2">' . $error . '</div>';
    //                 }
    //             } else {
    //                 // Assuming $user_DAO is an instance of the UserDAO class
    //                 $Result = $this->UserModel->login($email);
    
    //                 if ($Result &&  count($Result) > 0) {
    //                     $user = $Result[0];
    //                     $enteredPass = $user->getPassword();
    //                     $role = $user->getRole();
    //                     $_SESSION['role'] = $role ;
    //                     $_SESSION['email'] =  $email;
    //                     $_SESSION['id'] = $user->getUser_id();                  
    //                     if ($user && password_verify($password, $enteredPass)) {
    //                         $this->redirectBasedOnRole($role);
    //                     } else {
    //                         echo '<div class="bg-red-500 rounded-xl text-white p-2 my-2">Password incorrect</div>';
    //                     }
    //                 } else {
    //                     echo '<div class="bg-red-500 rounded-xl text-white p-2 my-2">User not found</div>';
    //                 }
    //             }
    //         }
    
    //         $this->view('pages/Registration/register');
    //     }
    
    // private function redirectBasedOnRole($role) {
    //     switch ($role) {
    //         case 'admin':
                
    //             echo '<script>window.location.replace(" '.URLROOT.'/DashbordControler");</script>';
    //             break;
    //         case 'client':
    //            echo '<script>window.location.replace("'.URLROOT.'/ClientController");</script>';
    //             break;
    //         case 'artist':
    //            echo '<script>window.location.replace("'.URLROOT.'/Artist");</script>';
    //             break;
    //         default:
               
    //             break;
    //     }
    // }
    
    }
    

