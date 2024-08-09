<?php
if(isset($_POST['user'])){
    class User{
        function getName($name){
            echo "User name is $name";
        }
    }

    $usr = new User;
    $usr->getName($_POST['user']);
}


?>
<form action="" method="post">
    <input type="text" name="user" id="">
    <br>
    <button type="submit">Submit</button>
</form>