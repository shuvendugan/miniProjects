<?php
// isset() vs empty()

$diff = NULL;

$var1 = 0;
$var2 = 0.0;
$var3 = '0';
$var4 = false;
$var5 = array();
$var6 = "";

if(isset($diff)){
    echo "if";
}else{
    echo "else";
}
echo "<br/>";
if(empty($diff)){
    echo "if";
}else{
    echo "else";
}



?>