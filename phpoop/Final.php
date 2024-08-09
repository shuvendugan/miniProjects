<?php
//when I want to make a class that can not benherite furhterthen I use final keyword
//when I want a method can not be over rided then I use final keyword

// final in class

// final class Honda{

// }
// class Cars extends Honda{

// }
// $c1 = new Cars;

//Fatal error: Class Cars cannot extend final class Honda in /usr/local/var/www/miniprojects/phpoop/Final.php on line 8


//final in method

// class Tata{
//     final function getCarName(){
//         echo 'Tiago';
//     }
// }

// class Cars extends Tata{
//     function getCarName(){
//         echo 'Harrier';
//     }
// }

// $C1 = new Cars();
// $C1->getCarName();

//Fatal error: Cannot override final method Tata::getCarName() in /usr/local/var/www/miniprojects/phpoop/Final.php on line 23

?>