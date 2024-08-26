<?php
$host = "localhost";
$db = "onlineVotingSystem";
$username = "root";
$password = "root";

try{
    $conn = new PDO("mysql:host=$this->host;dbname=$this->db",$this->username,$this->password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "Connection Done";
}catch(PDOException $err){
    echo $err->getMessage();
}
?>