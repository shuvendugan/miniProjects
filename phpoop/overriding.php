<?php 
//child class has the same method or property as parent class
//But child class as different implementation of method and properties

class Teacher{
    public $city = 'Bhubaneswar';
    function nextExam(){
        echo "next exam is in february";
    }
    function age(){
        echo "Age is 30";
    }
}

class student extends Teacher{
    public $city = 'Balaore';
    function age(){
        echo "Age is 15";
    }
}

$st = new student();
$st->age(); 
echo "<br>";

echo $st->city;

echo "<br>";
//if you want to access teacher age
$t1 = new  Teacher();

$t1->age();

?>