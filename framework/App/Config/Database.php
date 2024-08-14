<?php
namespace App\Config;
use PDO;
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
    public function fetchData($query,$params=[]){
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            return false;
        }
    }
    public function fetchSingle($query){
        try{
            $stmt = $this->conn->query($query);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            return false;
        }
    }
}

?>