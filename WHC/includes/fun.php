<?php
function pr($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
    // exit();
}

function  str_xss($string)
{
    $x = strip_tags($string);
    $xx = htmlentities($x);
    $xxx=addslashes($xx);
    
    return($xxx);
}
function sql_inj($val)	
{
    global $con;
    if(get_magic_quotes_gpc())
    {
		$val=stripslashes($val);
    }
    $val=mysqli_real_escape_string($con, $val);
    return($val);
}

function str_encrypt($str)	
{
    $ency_str=base64_encode($str);
    return($ency_str);
}

function str_dcrypt($str)	
{
    $dcr_str=base64_decode($str);
    return($dcr_str);
}

function showname_fromid($column, $table, $where="")
{
    global $con;
    $sqlstt= "SELECT $column FROM $table ";
    if($where != "")
            $sqlstt .= " where ".$where;
    
    $sql_qry = mysqli_fetch_array(mysqli_query($con, $sqlstt),MYSQLI_ASSOC);
    // echo $sqlstt;
    return($sql_qry["$column"]);		
}
function showname_fromid1($column, $table, $where="")
{
    global $con;
    $sqlstt= "SELECT $column FROM $table ";
    if($where != "")
            $sqlstt .= " where ".$where;
        echo $sqlstt;
    
    $sql_qry = mysqli_fetch_array(mysqli_query($con, $sqlstt),MYSQLI_ASSOC);
    return($sql_qry["$column"]);        
}
function divideArray($arr) {
    $arrayLength = count($arr);
    $partSize = ceil($arrayLength / 3);
    $remainder = $arrayLength % 3;
    $parts = [];
    $start = 0;
    for ($i = 0; $i < 3; $i++) {
        $end = $start + $partSize + ($i < $remainder ? 1 : 0);
        $parts[] = array_slice($arr, $start, $end - $start);
        $start = $end;
    }
    return $parts;
}
?>