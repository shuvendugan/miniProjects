<?php
class Company{
    function getName(){
        echo "This is TATA Mototrs.";
        return $this; // for method chaining we have to return this.
    }
    function getEmp(){
        echo " TATA has 30000 employess.";
        return $this;
    }
    function getTotalOffice(){
        echo " TATA has 200 office.";
    }
}

$cmp = new Company();

$cmp->getName()->getEmp()->getTotalOffice();

?>