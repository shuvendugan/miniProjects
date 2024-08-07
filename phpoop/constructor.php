<?php
// a specialfunction in class 
// call automatically when an object is com_created
// __constuct is fixed name for constructor

class ConstructDemo{
    function setName(){
        echo 'hello';
    } 
    function __construct(){
        echo "shuvendugan";
    }
}

$demo = new ConstructDemo();

// Note : There is only one __construct method we can create in php

?>