<?php
class Database{
    private $host = "10.20.38.161";
    private $db = "authdb";
    private $username = "root";
    private $password = "";
    public $conn ;

    public function __construct(){
        $this->conn = null;
        try{
            $this->conn = PDO("mysql:host=$this->host;dbname=$this->db",$this->username,$this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            // echo "Connection Successfully";
        }catch(PDOException $e){
            echo "Connection Failed : ".$e->getMessage();
        }
    }
}


?>