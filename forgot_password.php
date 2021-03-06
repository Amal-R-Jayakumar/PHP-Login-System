<?php require_once 'controllers/authController.php'; ?><!DOCTYPE html><html lang="en">
<head><title>SmartUSRS - Password Recovery</title><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1">
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

</head><body>
<div class="limiter"><div class="container-login100" style="background-image: url('login/images/bg-04.png');">
<div class="wrap-login100">
<form class="login100-form validate-form" action="forgot_password.php" method="post">
<span class="login100-form-logo"><img src="login/images/Smart USRS.png" height="120" width="120"></span>
<span class="login100-form-title p-b-34 p-t-27">SmartUSRS<br>Password Recovery</span>

<?php if (count($errors) != 0 ): ?>
<div class="input100">
<?php foreach($errors as $error): ?>
<?php echo $error; ?>
<?php endforeach; ?></div>
<?php endif; ?>

<!--EMAIL FOR RESETTING PASSWORD-->
<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
	<span class="label-input100"><label for="reset_email"></label></span>
	<input class="input100" type="email" name="reset_email" id="reset_email" value="<?php echo $email ?>" placeholder="Email addess...">
	<span class="focus-input100"></span>
</div>
<!--RESET LINK BUTTON-->
<div class="container-login100-form-btn"><div class="wrap-login100-form-btn">
    <div class="login100-form-bgbtn"></div>
    <button class="login100-form-btn" id="forgot_password" name="forgot_password">
    Send Reset Link
    </button>
</div></div>

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