<?php
$x = true && false; 
// output is  false


$x = true and false;
// output is true as precedence order of and is less than = for which firstit assig the value to x than it checking 



// echo var_dump($x);
echo var_dump(true and false);
?>