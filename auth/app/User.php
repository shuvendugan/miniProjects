<?php
require_once('Database.php');

class User extends Database{
    private $tableName ='users';
    public $id;
    public $name;
    public $email;
    public $password;

    public function register(){
        print_r($this->name);
        exit();
    }
}

?>