<?php
$host = "localhost";
$username = "root";
$password="";
$database = "nist";

$conn = new mysqli($host , $username,$password,$database);
if($conn -> connect_error){
    die("Error : ".$conn->connect_error);
}
// echo "connection success";
?>