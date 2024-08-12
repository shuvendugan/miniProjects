<?php
require_once('Database.php');

class User extends Database{
    private $tableName ='users';
    public $id;
    public $name;
    public $email;
    public $password;

    public function register(){

        $sql = "SELECT * FROM $this->tableName WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email',$this->email);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return false;
        }

        $sql = "INSERT INTO $this->tableName(name ,email,password) VALUES (:name,:email,:password)";

        $stmt = $this->conn->prepare($sql);

        $this->password = password_hash($this->password,PASSWORD_DEFAULT);

        $stmt->bindParam(':name',$this->name);
        $stmt->bindParam(':email',$this->email);
        $stmt->bindParam(':password',$this->password);


        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function login(){
        $sql = "SELECT * FROM $this->tableName WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email',$this->email);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row && password_verify($this->password,$row['password'])){
            $this->id = $row['id'];
            $this->name = $row['name'];
            return true;
        }else{
            return false;
        }
    }
}

?>