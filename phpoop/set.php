<?php
class User{
    private $name = 'sipu';
    
    function getName(){
       echo $this->name;
    }

    function __set($property ,$value){
        if(property_exists($this,$property)){
            $this->$property = $value;
        }else{
            echo "$property is not exist";
        }
    }
}

$user = new User;

$user->getName();
echo "<br>";
$user->name='shuvendugan';

$user->getName();


?>