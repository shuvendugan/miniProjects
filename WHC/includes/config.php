<?php
date_default_timezone_set("Asia/Kolkata");
error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);
ob_start();
//@define(HOST, '10.20.40.46');
@define('HOST', 'localhost');
@define('USER', 'root');
@define('PASSWORD', 'P@ssw0rd@SOA');
@define('DBNAME', 'itsnowdb');
$con = mysqli_connect(HOST, USER, PASSWORD, DBNAME) or die(mysqli_error());
?>
