<!DOCTYPE html>
<html>
<head>
	<title>Online Voting System</title>
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/login.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<script defer src="assets/js/jquery.js" ></script>
	<script defer src="assets/js/bootstrap.js" ></script>
</head>
<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="assets/images/logo.png" class="brand_logo" alt="Logo">
					</div>
				</div>
                <?php
                    if(isset($_GET['sign-up'])){
                ?>
                    <div class="d-flex justify-content-center form_container">
                        <form  method='POST'>
                            <div class="input-group mb-2">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="su_username" class="form-control input_user"  placeholder="username" required/>
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="su_contact" class="form-control input_user"  placeholder="Mobile no" required/>
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="text" name="su_password" class="form-control input_pass"  placeholder="password" required/>
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="su_confPass" class="form-control input_pass"  placeholder="Confirm password" required/>
                            </div>
                            
                            <div class="d-flex justify-content-center mt-3 login_container">
                                <button type="submit" name="btnSignup" class="btn login_btn">Sign up</button>
                            </div>
                        </form>
                    </div>
                    <div class="mt-4">
                        <div class="d-flex justify-content-center links text-white">
                            Already have an account? <a href="index.php" class="ml-2 text-white text-decoration-none"> Sign In</a>
                        </div>
                    </div>
                <?php

                    }else{
                ?>
                        <div class="d-flex justify-content-center form_container">
                            <form>
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="userName" class="form-control input_user" placeholder="username">
                                </div>
                                <div class="input-group mb-2">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input type="password" name="password" class="form-control input_pass" placeholder="password">
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customControlInline">
                                        <label class="custom-control-label text-white" for="customControlInline">Remember me</label>
                                    </div>
                                </div>
                                    <div class="d-flex justify-content-center mt-3 login_container">
                                        <button type="button" name="btnLogin" class="btn login_btn">Login</button>
                                    </div>
                            </form>
                        </div>
                        <div class="mt-4">
                            <div class="d-flex justify-content-center links text-white">
                                Don't have an account? <a href="?sign-up=1" class="ml-2 text-white text-decoration-none">Sign Up</a>
                            </div>
                            <div class="d-flex justify-content-center links">
                                <a class='text-white text-decoration-none' href="#">Forgot your password?</a>
                            </div>
                        </div>
                <?php
                    }
                    if(isset($_GET['register'])){
                        echo "<span class='bg-white text-success text-center' > Your account has been created successfull!</span>";
                    } else if(isset($_GET['invalid'])){
                        echo "<span class='bg-white text-danger text-center' >Password Mismatch</span>"; 
                    }
                ?>
				
			</div>
		</div>
	</div>
</body>
</html>
<?php
require_once('includes/Database.php');
if(isset($_POST['btnSignup'])){
    $su_username = mysqli_real_escape_string($conn,$_POST['su_username']);
    $su_contact = mysqli_real_escape_string($conn,$_POST['su_contact']);
    $su_password = mysqli_real_escape_string($conn,$_POST['su_password']);
    $su_confPass = mysqli_real_escape_string($conn,$_POST['su_confPass']);
    $userRole = 'voter';
    if($su_password === $su_confPass){
        $qry= "INSERT INTO users(userName,ContactNo,password,userRole) values ($su_username,$su_contact,$su_password,$userRole)";

        $stmt = $conn->exec($qry);
        header('Location: index.php?sign-up=1&register=1');
        exit();
    }else{
        // echo "<script>location.assign('Location: index.php?sign-up=1');</script>";
        header('Location: index.php?sign-up=1&invalid=1');
        exit();
    }
}
?>