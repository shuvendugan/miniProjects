<?php
include_once "app/User.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user = new User;
    $user->name = $_POST['name'];
    $user->email = $_POST['email'];
    $user->password = $_POST['password'];
    if($user->register()){
        echo "User register successfully";
    }else{
        echo "User not register";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Auth system</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <div class='row d-flex justify-content-center' >
        <div class='col-lg-6'>
            <h2>Register form</h2>
            <form action="register.php" method='POST'>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
                <a href="login.php" class='btn btn-primary'>Login</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>
