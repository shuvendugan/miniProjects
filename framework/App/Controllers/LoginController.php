<?php
namespace App\Controllers;
use App\Models\UserModel;
use PDO;

class LoginController{
    public function index(){
        
        view('auth.login');
    }
    public function login(){
        $user = new UserModel;
        $user->email = $_POST['email'];
        $user->password = $_POST['password'];
        if($user->login()){
            $_SESSION['user_id']= $user->id;
            redirect('dashboard');
        }else{ 
            echo "User not login";
        }
    }
    public function logout(){
        $_SESSION = [];
        session_destroy();
        redirect('login');
    }
}