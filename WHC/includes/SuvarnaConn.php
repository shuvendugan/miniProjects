<?php 
$serverName = "10.20.10.26";//"serverName\\sqlexpress"; //serverName\instanceName
//echo $serverName;
$connectionInfo = array( "Database"=>"SOA_HIMS_P_M", "UID"=>"sa", "PWD"=>"Suvarna$123");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

// if( $conn ) {
//    echo "Connection established.<br />";
// }else{
//     echo "Connection could not be established.<br />";
//     die( print_r( sqlsrv_errors(), true));
// }
?>