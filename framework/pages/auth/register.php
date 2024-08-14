<?php pageAdd('includes/header.php');?>
<div class="container">
    <div class='row d-flex justify-content-center' >
        <div class='col-lg-6'>
            <h2>Register form</h2>
            <form action="registerAction" method='POST'>
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
                <a href="login" class='btn btn-primary'>Login</a>
            </form>
        </div>
    </div>
</div>
<?php pageAdd('includes/footer.php');?>
