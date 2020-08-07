<?php require_once 'controllers/authController.php'; ?><!DOCTYPE html><html lang="en">
<head><title>SmartUSRS - Password Reset</title><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="login/images/icons/favicon.ico"/>
<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="login/fonts/iconic/css/material-design-iconic-font.min.css">
<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
<link rel="stylesheet" type="text/css" href="login/vendor/animsition/css/animsition.min.css">
<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
<link rel="stylesheet" type="text/css" href="login/vendor/daterangepicker/daterangepicker.css">
<link rel="stylesheet" type="text/css" href="login/css/util.css">
<link rel="stylesheet" type="text/css" href="login/css/main.css">

<style>
   #form label{float:left; width:140px;}
   #error_msg{color:red; font-weight:bold;}
</style>

<script>
   $(document).ready(function(){
	   var $submitBtn = $("#registration_form button[id='signup']");
	   var $passwordBox = $("#new_password");
	   var $confirmBox = $("#confirm_new_password");
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


	   $("#confirm_new_password, #new_password")
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

</head><body>
<div class="limiter"><div class="container-login100" style="background-image: url('login/images/bg-01.jpg');">
<div class="wrap-login100">
<form class="login100-form validate-form" action="change_password.php" method="post">
<span class="login100-form-logo"><img src="login/images/Smart USRS.png" height="120" width="120"></span>
<span class="login100-form-title p-b-34 p-t-27">SmartUSRS<br>Reset Password</span>
<?php if (count($errors) != 0 ): ?>
<div class="input100">
<?php foreach($errors as $error): ?>
<?php echo $error; ?>
<?php endforeach; ?></div>
<?php endif; ?>
<!--PASSWORD-->
<div class="wrap-input100 validate-input" data-validate = "Password is required">
	<input class="input100" type="password" name="new_password" id="new_password" required data-toggle="popover" title="Password Strength" placeholder="Password...">
	<span class="focus-input100"></span>
</div>

<!--PASSWORD CONFIRMATION-->
<div class="wrap-input100 validate-input" data-validate = "Password Confirmation is required">
	<input class="input100" type="password" name="confirm_new_password" id="confirm_new_password" placeholder="Confirm Password...">
	<span class="focus-input100"></span>
</div>
<!--BUTTON-->
<div class="container-login100-form-btn"><div class="wrap-login100-form-btn">
    <div class="login100-form-bgbtn"></div>
    <button class="login100-form-btn" id="change_password" name="change_password">
    Reset Password
    </button><br>
    
</div>
<br><br>
<p><strong>A password reset link has been sent to your email address.</strong></p>
<br>
</div>

<div id="dropDownSelect1"></div>	
<!--===============================================================================================-->
<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
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