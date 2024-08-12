<?php
class Database{
    private $host = "localhost";
    private $db = "authdb";
    private $username = "root";
    private $password = "root";
    public $conn ;

    public function __construct(){
        $this->conn = null;
        try{
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db",$this->username,$this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            // echo "Connection Successfully";
        }catch(PDOException $e){
            echo "Connection Failed : ".$e->getMessage();
        }
    }
}

?>