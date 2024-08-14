<?php pageAdd('includes/header.php');?>
<div class="container">
    <div class='row d-flex justify-content-center'>
        <div class='col-lg-6'>
            <h2>Login form</h2>
            <form action="loginAction" method='POST'>
              <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
              </div>
              <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
              <a href="register" class='btn btn-primary'>Register</a>
            </form>
        </div>
    </div>
</div>
<?php pageAdd('includes/footer.php');?>

