<?php
require_once('logAuth.php');
include_once "app/User.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user = new User;
    $user->email = $_POST['email'];
    $user->password = $_POST['password'];
    if($user->login()){
      $_SESSION['user_id']= $user->id;
      header('Location: dashboard.php');
      exit();
    }else{ 
        echo "User not login";
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
    <div class='row d-flex justify-content-center'>
        <div class='col-lg-6'>
            <h2>Login form</h2>
            <form action="login.php" method='POST'>
              <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
              </div>
              <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
              <a href="register.php" class='btn btn-primary'>Register</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>
