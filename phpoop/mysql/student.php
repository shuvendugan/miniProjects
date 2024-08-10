<?php
require_once('config.php');
class student{
    private $dbConn;
    public function __construct($conn){
        $this->dbConn = $conn;
    }
    public function getData(){
        $sql = "SELECT * FROM student";
        $getStudents = $this->dbConn->prepare($sql);
        $getStudents->execute();
        $result = $getStudents->fetchAll();
        echo "<pre>";
        print_r($result);
        echo "</pre>";
    }
}
$s1 = new student($conn);
$s1->getData();

?>