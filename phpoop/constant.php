<?php
class ConstantDemo{
    // const name ='shuvendugan';
    // private const name ='shuvendugan';
    protected const name ='shuvendugan';
    function getName(){
        echo self::name;
        echo ConstantDemo::name;
    }
}
class Child extends ConstantDemo{
    function getChildName(){
        echo self::name;
        echo ConstantDemo::name;
    }
}


// echo ConstantDemo::name;
// echo "<br/>";
// $cd1 = new ConstantDemo;
// $cd1->getName();


$c1 = new Child;
$c1->getChildName();

?>