<?php
$host = "localhost";
$userName = 'root';
$password = 'root';
$db = 'test';
$conn = new PDO("mysql:host=$host;dbname=$db",$userName,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);



?>