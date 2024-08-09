<?php
trait parentCompany1{
    function getEmp(){
        echo 200;
    }
}
trait parentCompany2{
    function getEmp(){
        echo 500;
    }
}

class Company{
    use parentCompany1;
    use parentCompany2{
        parentCompany1::getEmp insteadOf parentCompany2;//it call parentcompany1 's method
        parentCompany2::getEmp as getEmpCompany2; // it call parentcompany2 ' s method
    }


    // function getEmp(){
    //     echo 100;
    // }
}


$cmp = new Company;
$cmp->getEmp();
$cmp->getEmpCompany2();

?>