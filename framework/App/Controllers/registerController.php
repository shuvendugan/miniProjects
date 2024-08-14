<?php
namespace App\Controllers;
use App\Models\UserModel;
use PDO;

class RegisterController{
    public function index(){
       view('auth.register');
    }
    public function register(){
        $user = new UserModel;
        $user->name = $_POST['name'];
        $user->email = $_POST['email'];
        $user->password = $_POST['password'];
        if($user->register()){
            redirect('login');
        }else{
            echo "User not register";
        }
    }
}