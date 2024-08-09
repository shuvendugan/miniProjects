<?php
//these are the template of  child class that whchi mecthod should be present inside the class


//Template that defines methods for a child class
// In abstract class we declare method but writeimplementaion in child class

//to define mandatory features of child class

abstract class Product {
    abstract function productDetails();
    abstract function productImage();
    function common(){ // we can add extra metho rather than abstract
        echo "This is common methid";
    }
}
class UploadProduct extends Product{
    function productDetails(){
        echo "This is Product details";
    }
    function productImage(){
        echo "THis is Product Image";
    }
    function other(){ // we can add extra method  rather than defined
        echo "this is other method";
    }
}

$upload = new UploadProduct;

$upload->productDetails();
$upload->productImage();
$upload->common();
$upload->other();



?>