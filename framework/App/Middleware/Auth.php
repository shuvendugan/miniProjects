<?php
namespace App\Middleware;

Class Auth{
    public function handle(){
        if(!isset($_SESSION['user_id'])){
            redirect('login');
            exit();
        }
    }
}


?>