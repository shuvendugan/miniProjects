<?php
// include_once('Teacher.php');

// $t1 = new Teacher();

function autoLoader($class){
    include($class.'.php');
}
spl_autoload_register('autoLoader');

$t1 = new Teacher;
echo "<br/>";
$s1 = new Student;
echo "<br/>";
$m1 = new Management;

?>