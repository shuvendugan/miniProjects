<?php
// when we calling a property which is not exit or we miskenty type something then  __get() is call automatically .. to show the proper error messgae

class User{
    public $name="shuvenudgan";
    private $age = 25;
    function __get($property){
        echo "$property is not exist";
    }

}
$usr = new User;

echo $usr->name."\n";
echo $usr->age;

?>