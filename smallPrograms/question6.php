<?php
// function called as parameter

function callMe(){
    echo "callMe function called";
}

function apple($fun){
    $fun();
}


// apple('callme'); 
// or

$function = 'callMe';
apple($function);
?>