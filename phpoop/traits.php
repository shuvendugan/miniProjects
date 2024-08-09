<?php
//it is a mechanism to reuse code in single inheritance like PHP
//it almost like a class
//it resolve the multiple inheritance issue in php

trait parentCompany{
    function getTotalEmp(){
        echo 500;
    }
    function getTotalProjects(){
        echo 50;
    }
}
trait anotherParentcompany{
    function getTotalOfice(){
        echo 10;
    }
}

class company{
    use parentCompany;
    use anotherParentCompany;
    function getOther(){
        echo "Other";
    }
}

$cmp = new company;

$cmp->getTotalEmp();
$cmp->getTotalProjects();
$cmp->getTotalOfice();
$cmp->getOther();
?>