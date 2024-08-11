<?php
$a = null;
$b;
$c="";


echo var_dump(10 == '10'); //true it check value
echo var_dump(10 === '10');// false it check value with datatype

echo var_dump($a == $b);//true
echo var_dump($a === $b);//true
echo var_dump($b == $c);//true
echo var_dump($b === $c); // flase as $c is string type

?>