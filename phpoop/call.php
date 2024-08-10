<?php
class User{
    function __call($method,$args){
        // echo "$methodd method is not found";
        // echo "<br>";
        // print_r($args);
        if(method_exists($this,$method)){
            // echo "$method is private method";
            call_user_func_array([$this,$method],$args);

        }else{
            echo "$method not found";
        }

        
    }
    private function getName($name){
        echo $name;
    }


}

$user = new User;

$user->getName("shuvendsssssugan");

?>