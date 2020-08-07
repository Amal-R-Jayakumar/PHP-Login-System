<?php 
require_once 'controllers/authController.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>SmartUSRS-Registration</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
<!--===============================================================================================-->
<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
<!--===============================================================================================-->
<script src="option.js"></script>

<style>
   #form label{float:left; width:140px;}
   #error_msg{color:red; font-weight:bold;}
</style>

<script>
   $(document).ready(function(){
	   var $submitBtn = $("#registration_form button[id='signup']");
	   var $passwordBox = $("#password");
	   var $confirmBox = $("#confirm_password");
	   var $errorMsg =  $('<span id="error_msg">Passwords do not match.</span>');

	   // This is incase the user hits refresh - some browsers will maintain the disabled state of the button.
	   $submitBtn.removeAttr("disabled");

	   function checkMatchingPasswords(){
		   if($confirmBox.val() != "" && $passwordBox.val != ""){
			   if( $confirmBox.val() != $passwordBox.val() ){
				   $submitBtn.attr("disabled", "disabled");
				   $errorMsg.insertAfter($confirmBox);
			   }
		   }
	   }

	   function resetPasswordError(){
		   $submitBtn.removeAttr("disabled");
		   var $errorCont = $("#error_msg");
		   if($errorCont.length > 0){
			   $errorCont.remove();
		   }  
	   }


	   $("#confirm_password, #password")
			.on("keydown", function(e){
			   /* only check when the tab or enter keys are pressed
				* to prevent the method from being called needlessly  */
			   if(e.keyCode == 13 || e.keyCode == 9) {
				   checkMatchingPasswords();
			   }
			})
			.on("blur", function(){                    
			   // also check when the element looses focus (clicks somewhere else)
			   checkMatchingPasswords();
		   })
		   .on("focus", function(){
			   // reset the error message when they go to make a change
			   resetPasswordError();
		   })

   });
 </script>
 

</head>


<body style="background-color: #999999;">


	<div class="limiter">
		<div class="container-login100" style="background-image: url('login/images/bg-03.jpg');">
			<div class="login100-more"></div>

<!--HEADING-->
			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				<form id="registration_form" name="registration_form" class="login100-form validate-form" action="registration.php" method="post">
					<span class="login100-form-title p-b-59">
						<img src="login/images/Smart USRS.png" height="50" width= "150" alt="SmartUSRS"> - Sign Up 
					</span>
<!--ERRORS DISPLAY-->

<?php
if (count($errors) != 0 ): 
    foreach($errors as $error): ?>
        <div class="alert alert-danger">
        <?php echo $error; ?>
        <?php endforeach; ?>
        </div>
    <?php endif; ?>
<!--NAME-->
<div class="wrap-input100 validate-input" data-validate="Name is required">
	<!--<span class="label-input100"><Label for="name">Full Name</label></span>-->
	<input class="input100" type="text" name="name" id="name" value="<?php echo $name; ?>" placeholder="Name...">
	<span class="focus-input100"></span>
</div>
<!--EMAIL-->
<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
	<!--<span class="label-input100"><label for="email">Email Address</label></span>-->
	<input class="input100" type="email" name="email" id="email" value="<?php echo $email ?>" placeholder="Email addess...">
	<span class="focus-input100"></span>
</div>
<!--USERNAME-->
<div class="wrap-input100 validate-input" data-validate="Username is required">
	<!--<span class="label-input100"><label for="username">Username</label></span>-->
	<input class="input100" type="text" name="username"  id="username" value="<?php echo $username; ?>" placeholder="Username...">
	<span class="focus-input100"></span>
</div>
<!--PASSWORD-->
<div class="wrap-input100 validate-input" data-validate = "Password is required">
	<!--<span class="label-input100"><label for="password">Password</label></span>-->
	<input class="input100" type="password" name="password" id="password" required data-toggle="popover" title="Password Strength" placeholder="Password...">
	<span class="focus-input100"></span>
</div>
<!--PASSWORD CONFIRMATION-->
<div class="wrap-input100 validate-input" data-validate = "Password Confirmation is required">
	<!--<span class="label-input100"><label for="confirm_password">Confirm Password</label></span>-->
	<input class="input100" type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password...">
	<span class="focus-input100"></span>
</div>
<!--Terms and Conditions-->
<div class="flex-m w-full p-b-33">
	<div class="contact100-form-checkbox">
		<input class="input-checkbox100" id="agree" type="checkbox" name="agree" value="agree">
		<label class="label-checkbox100" for="agree">
			<span class="txt1">
				I agree to the
				<a href="#" class="txt2 hov1">
					Terms and Conditions
				</a>
			</span>
		</label>
	</div>	
</div>
<!--Buttons-->
<div class="container-login100-form-btn">
	<div class="wrap-login100-form-btn">
		<div class="login100-form-bgbtn"></div>
		<button class="login100-form-btn" id="signup" name="signup">
			Sign Up
		</button>
		</div>

			<a href="index.php" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
			Log in
			<i class="fa fa-long-arrow-right m-l-5"></i>
			</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->

<!--===============================================================================================-->
	<script src="login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/bootstrap/js/popper.js"></script>
	<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/daterangepicker/moment.min.js"></script>
	<script src="login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="login/js/main.js"></script>

</body>
</html>