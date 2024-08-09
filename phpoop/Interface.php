<?php
//Interface tell what methods a class should implement

//interface vs abstract class
//INterface cannot have properties , While abstract class have
//All interface method must be public, While abstract class methods are public or protected
//All methods in an Interface are abstract so they can not be implemnted in code and the abstract keyword is not necessery

interface ProductFeatures{
    function images();
    function ownerDetails();
    // function common(){ // Implementation of function is not possible inside interface
    //    echo "this is common" 
    // }
}
class Product implements ProductFeatures{
    function images(){
        echo 'THis is function Images';
    }
    function ownerDetails(){
        echo "THis is owner details";
    }
    function other(){ // this is possible
        echo "this is other method";
    }
}
$p = new Product;

$p->images();
$p->ownerDetails();
$p->other();
?>