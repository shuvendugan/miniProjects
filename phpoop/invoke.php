<?php
// when we call a class object as function then __invoke() call_user_method
class User{
    function getName(){
        echo "shuvendugan";
    }
    function __invoke(){
        $this->getName();
        // echo "shuvendugan";
    }
}
$usr = new user();
// $usr->getName();
$usr(); //we have to call like this to call a invoke function.
?>