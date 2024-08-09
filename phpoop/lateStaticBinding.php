<?php
// with the help of this we can call current static method in inherited class 

class CountrySale{
    static public $sale = 1000;
    function getSaleValue(){
        // echo self::$sale;
        echo static::$sale; // it give the output inherited class
    }
    static function areaName(){
        echo 'India';
    }
    function getAreaName(){
        // self::areaName();
        static::areaName();
    }
}

class CitySale extends CountrySale{
    static public $sale = 50; 
    static function areaName(){
        echo "Bhubaneswar";
    }
}

// $c1 = new CountrySale;
// $c1->getSaleValue();
// $c1->getAreaName();


$c1 = new CitySale;
$c1->getSaleValue();
$c1->getAreaName();

?>