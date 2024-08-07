<?php
//The Process of transmission of genes from parents to offspring
// pssing features from parent class to child class 

class Userauth{
    function login($userType){
        echo $userType.' logged in';
    }
}

class Students extends Userauth {
    function getName(){
        echo 'shuvendugan';
    }
}
class Teacher extends Userauth {
    function getSkill(){
        echo "DSA";
    }
    
}
$s1 = new Students();
$s1->login('Student');
$s1->getName();


echo '<br>';
$t1 = new Teacher();
$t1->login('Teacher');
$t1->getSkill();

?>