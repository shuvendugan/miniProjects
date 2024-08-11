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
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
              <a href="register.php" class='btn btn-primary'>Register</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>
