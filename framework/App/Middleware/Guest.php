<?php
namespace App\Middleware;

Class Guest{
    public function handle(){
        if(isset($_SESSION['user_id'])){
            redirect('dashboard');
            exit();
        }
    }
}


?>