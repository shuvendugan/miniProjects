<?php
$num = 1123456;
$sum = 0;
$rem = 0;
$length = strlen($num);

for($i=0;$i<=$length;$i++){
    $rem = $num%10;
    $sum += $rem;
    $num /=10;
}

echo "Sum of digit is $sum";
?>