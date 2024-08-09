<?php
// when we use statickey word before a method or properties then it call static methd and static property respectively
//it can be called without using object of class
//it make the code faster
//when use same method again again then we use satic method

// class Honda{
//     function companyName(){
//         echo "Honda";
//     }

//     //function 2
//     //function 3
    
//     // function 4
// }

// $h1 = new Honda(); //it loadall the function so it make the code bit slower

// but if we use static method

class Honda{
    static $countryName = 'Japan';
    static function companyName(){
        echo "Honda";
    }
    // function 2
    //function 3
    
    // function 4
}

Honda::companyName();
echo Honda::$countryName;



?>