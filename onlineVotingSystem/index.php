<!DOCTYPE html>
<html>
    
<head>
	<title>Online Voting System</title>
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/login.css">
	<link rel="stylesheet" href="assets/css/style.css">

	<script src="assets/js/jquery.js" defer></script>
	<script src="assets/js/bootstrap.js" defer></script>

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
                                    <input type="text" name="su_usernmae" class="form-control input_user"  placeholder="username" required/>
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
                                    <input type="text" name="" class="form-control input_user" value="" placeholder="username">
                                </div>
                                <div class="input-group mb-2">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input type="password" name="" class="form-control input_pass" value="" placeholder="password">
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customControlInline">
                                        <label class="custom-control-label text-white" for="customControlInline">Remember me</label>
                                    </div>
                                </div>
                                    <div class="d-flex justify-content-center mt-3 login_container">
                                        <button type="button" name="button" class="btn login_btn">Login</button>
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
                ?>
				
			</div>
		</div>
	</div>
</body>
</html>
