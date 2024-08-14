<?php
namespace App\Controllers;
use App\Models\UserModel;

class HomeController{
    public function index(){
        $user = new UserModel;
        $data = $user->fetchSingle('SELECT * FROM users WHERE id=1');
        view('dashboard',[
            'userData'=>$data,
            'name'=>'shuvendugan'
        ]);
    }
    public function Home(){

    }
}