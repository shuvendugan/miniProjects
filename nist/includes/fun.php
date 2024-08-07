<?php
function pr($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
    // exit();
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
?>