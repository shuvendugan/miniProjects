<?php
// we can define nestedfunction in php

function apple(){
    function banana(){
        return "banana";
    }
    // echo banana();
    return "apple";
}

// echo banana(); // this is giving error

echo apple();

echo banana(); 

?>